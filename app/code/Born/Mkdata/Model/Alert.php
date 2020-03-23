<?php

namespace Born\Mkdata\Model;

/**
 * Class Alert
 * @package Born\Mkdata\Model
 */
class Alert
{
    /**
     * @var \Born\Mkdata\Helper\Data
     */
    protected $helper;

    /**
     * Alert constructor.
     * @param \Born\Mkdata\Helper\Data $helper
     */
    public function __construct(
        \Born\Mkdata\Helper\Data $helper
    ) {
        $this->helper = $helper;
    }

    /**
     * @param $subject
     * @param $data
     * @param $type
     * @throws \Zend_Mail_Exception
     */
    public function sendMessage($subject, $data, $type)
    {
        $body = "";

        foreach ($data as $label => $value) {
            if (strpos($label, 'before') !== false) {
                $body .= "\n";
                continue;
            }

            if (strpos($label, 'mkdata') !== false) {
                foreach ($value as $mkentity) {
                    foreach ($mkentity as $mklabel => $mkvalue) {
                        $body .= $mklabel . ": " . $mkvalue . "\n";
                    }
                }

                $body .= "\n";
                continue;
            }

            $body .= $label . ": " . $value . "\n";
        }

        $recipients = $this->helper->getAlertsRecipients();
        $recipients = explode(',', $recipients);
        $recipients = array_map('trim', $recipients);

        if (!count($recipients)) {
            return;
        }

        if ($type == 'timeout' && !$this->helper->getAlertOnTimeout()) {
            return;
        }

        if ($type == 'review' && !$this->helper->getAlertOnReview()) {
            return;
        }

        $email = new \Zend_Mail();
        $email->setSubject($subject);
        $email->setBodyText($body);
        $email->setFrom($this->helper->getAlertsFromEmail(), $this->helper->getAlertsFromName());

        foreach ($recipients as $recipient) {
            $email->addTo($recipient);
        }

        $email->send();
    }
}