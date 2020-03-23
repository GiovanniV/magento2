# Sample SAML PHP Service Provider #

This sample code is provided "as is" by SSO Engineering. We currently do not provide support for the sample code or for any issues that arise through its use. As an application developer, you are expected to have a working SSO implementation as part of the engagement process.

You can see a working example of this application at:
https://vmsssodemo01.amr.corp.intel.com/SamlPhp/

## Table of Contents ##
1. [Requirements](#requirements)
2. [How to Engage with SSO Engineering](#how-to-engage-with-sso-engineering)
3. [How to Set up the Sample Code on Your Server](#how-to-set-up-the-sample-code-on-your-server)

## Requirements ##

This sample application requires the following library:

**simpleSAMLphp** This is a free PHP library that can be used to create a SAML Service Provider and more. See https://simplesamlphp.org/ for more information.

This code requires a config.php file. A template file is provided, called config.template.php. This file must be renamed to config.php after any necessary modifications.

## How to Engage with SSO Engineering ##
You will need to engage with SSO Engineering in order to set up the sample application on your server or to set up your new or existing SAML application. See http://goto/engagesso for instructions.

## How to Set up the Sample Code on Your Server ##

1. Before you begin, you will need to engage with SSO Engineering. In order to get the sample application up and running, some configuration needs to be performed on Intel SSO systems. See above for instructions to engage.
    4. You do not need to fill out an engagement document. Simply state that you are setting up the sample SAML PHP application.
    6. You need to provide the Entity ID and Assertion Consumer Service URL with the HTTP-POST binding for your application. These can be found in the simpleSAMLphp admin console:
        1. Log into the simpleSAMLphp admin console at the simplesaml virtual path on your server, for example https://yourserver.com/simplesaml.
        2. Click on the Federation tab.
        3. Locate the SAML 2.0 SP Metadata section for your application and click on Show metadata.
        4. Click on the link "get the metadata xml on a dedicated URL". This will download the metadata file.
        5. Provide the metadata file to SSO Engineering.
7. Copy all the repository files to your server.
8. Create the config.php file:
    9. Copy the contents of the config.template.php file into a new file called config.php.
    10. Open the new config.php file and make the following changes:
        11. $SAML_SP_ID: Set this to a unique identifier for your application. This should be the SP ID that you provided to SSO Engineering.
        12. $HOME_PAGE_URL: Set this to the full URL of the home page of your application. For example, https://yourserver.com/.
13. Set up simpleSAMLphp. The following steps assume you are using PHP in IIS on a Windows server, but you can do this on another type of server in a similar manner.
    1. Download the latest version of simpleSAMLphp from https://simplesamlphp.org/download.
    2. Install simpleSAMLphp according to the documentation at https://simplesamlphp.org/docs/stable/.
    7. Configure the Service Provider. In the simpleSAMLphp installation folder, open config/authsources.php and add an entry to the $config array like below. Replace <SP ID> with your Service Provider ID and <IdP ID> with the Identity Provider ID.

            '<SP ID>' => array(
                'saml:SP',
                'entityID' => '<SP ID>',
                'idp' => '<IdP ID>',
                'signature.algorithm' => 'http://www.w3.org/2001/04/xmldsig-more#rsa-sha256'
            )

8.	Configure the Identity Provider. Open metadata/saml20-idp-remote.php and add an entry to the $metadata associative array like below. Replace <IdP SSO URL> with the Single Sign On Service URL for the Identity Provider and <IdP SLO URL> with the Single Logout Service URL for the Identity Provider. The SLO URL will usually be something like https://signindev.intel.com/Logout. In that case, add a Target parameter to the end of the SLO URL specifying the location of the destroySession.php page. For example, https://signindev.intel.com/Logout?Target=https%3a%2f%2fyourserver.com%2fdestroySession.php.

        $metadata['<IdP ID>'] = array(
            'SingleSignOnService'  => '<IdP SSO URL>',
            'SingleLogoutService'  => '<IdP SLO URL>?RedirectURL=<URL-encoded URL of destroySession.php>',
            'certificate'     => 'idpcertificate.cer'
        );

9.	Copy the IdP certificate .cer file to the cert folder (create the cert folder in the root of the simpleSAMLphp installation if it doesn’t exist).
11.	Configure the Service Provider with the Identity Provider. The assertion consumer service URL can be found in the SP metadata generated on the Federation tab in the admin web console (https://yourserver.com/simplesaml).
12.	In the admin web console, test logging in by going to the Authentication tab and clicking on Test configured authentication sources.
13.	Test logging out by clicking on Logout after logging in.
