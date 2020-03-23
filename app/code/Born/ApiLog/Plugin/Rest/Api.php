<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\ApiLog\Plugin\Rest;

use Born\ApiLog\Logger\Handler;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Webapi\Rest\Response;
use Magento\Webapi\Controller\Rest;

/**
 * Class Api
 * @package Born\ApiLog\Plugin\Rest
 */
class Api
{
    /**
     * @var Handler
     */
    protected $logger;

    /** @var array */
    protected $currentRequest;

    /**
     * Api constructor.
     * @param Handler $logger
     */
    public function __construct(Handler $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param Rest $subject
     * @param callable $proceed
     * @param RequestInterface $request
     * @return mixed
     */
    public function aroundDispatch(
        Rest $subject,
        callable $proceed,
        RequestInterface $request
    ) {
        try {
            $this->currentRequest = [
                'is_api' => true,
                'is_auth' => $this->isAuthorizationRequest($request->getPathInfo()),
                'request' => [
                    'method' => $request->getMethod(),
                    'uri' => $request->getRequestUri(),
                    'version' => $request->getVersion(),
                    'headers' => [],
                    'body' => '',
                ],
                'response' => [
                    'headers' => [],
                    'body' => '',
                ],
            ];
            foreach ($request->getHeaders()->toArray() as $key => $value) {
                $this->currentRequest['request']['headers'][$key] = $value;
            }
            $this->currentRequest['request']['body'] = $this->currentRequest['is_auth'] ?
                'Request body is not available for authorization requests.' :
                $request->getContent();
        } catch (\Exception $exception) {
            $this->logger->debug(sprintf(
                'Exception when logging API request: %s (%s::%s)',
                $exception->getMessage(),
                $exception->getFile(),
                $exception->getLine()
            ));
        }

        return $proceed($request);
    }

    /**
     * @param Response $subject
     * @param $result
     * @return mixed
     */
    public function afterSendResponse(
        Response $subject,
        $result
    ) {
        try {
            foreach ($subject->getHeaders()->toArray() as $key => $value) {
                $this->currentRequest['response']['headers'][$key] = $value;
            }
            $this->currentRequest['response']['body'] = $this->currentRequest['is_auth'] ?
                'Response body is not available for authorization requests.' :
                $subject->getBody();
            $this->logger->debug('', $this->currentRequest);
        } catch (\Exception $exception) {
            $this->logger->debug('Exception when logging API response: ' . $exception->getMessage());
        }

        return $result;
    }

    /**
     * @param string $path
     * @return bool
     */
    protected function isAuthorizationRequest(string $path) : bool
    {
        return preg_match('/integration\/(admin|customer)\/token/', $path) !== 0;
    }
}
