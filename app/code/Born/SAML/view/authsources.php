<?php

$config = array(

    // This is a authentication source which handles admin authentication.
    'admin' => array(
        // The default is to use core:AdminPassword, but it can be replaced with
        // any authentication source.

        'core:AdminPassword',
    ),

    // An authentication source which can authenticate against both SAML 2.0
    // and Shibboleth 1.3 IdPs.
    'Intel_realsenseDEV' => array(
        'saml:SP',

        // The entity ID of this SP.
        // Can be NULL/unset, in which case an entity ID is generated based on the metadata URL.
        'entityID' => 'Intel_realsenseDEV',

        // The entity ID of the IdP this should SP should contact.
        // Can be NULL/unset, in which case the user will be shown a list of available IdPs.
        'idp' => 'sepmp_dev',


        // The URL to the discovery service.
        // Can be NULL/unset, in which case a builtin discovery service will be used.
        'certificate' => __DIR__ . '/cert/signingcert03052025.cer',
        'signature.algorithm' => 'http://www.w3.org/2001/04/xmldsig-more#rsa-sha256',
        'attributes' => array('EmailAddress','FirstName','LastName')

    ),
    // An authentication source which can authenticate against both SAML 2.0
    // and Shibboleth 1.3 IdPs.
    'Intel_resalsensePP' => array(
        'saml:SP',

        // The entity ID of this SP.
        // Can be NULL/unset, in which case an entity ID is generated based on the metadata URL.
        'entityID' => 'Intel_resalsensePP',

        // The entity ID of the IdP this should SP should contact.
        // Can be NULL/unset, in which case the user will be shown a list of available IdPs.
        'idp' => 'sepmp_preprod',


        // The URL to the discovery service.
        // Can be NULL/unset, in which case a builtin discovery service will be used.
        'certificate' => __DIR__ . '/cert/signingcert03052025.cer',
        'signature.algorithm' => 'http://www.w3.org/2001/04/xmldsig-more#rsa-sha256',
        'attributes' => array('EmailAddress','FirstName','LastName')

    ),
    // An authentication source which can authenticate against both SAML 2.0
    // and Shibboleth 1.3 IdPs.
    'Intel_realsensePROD' => array(
        'saml:SP',

        // The entity ID of this SP.
        // Can be NULL/unset, in which case an entity ID is generated based on the metadata URL.
        'entityID' => 'Intel_realsensePROD',

        // The entity ID of the IdP this should SP should contact.
        // Can be NULL/unset, in which case the user will be shown a list of available IdPs.
        'idp' => 'sepmp_prod',


        // The URL to the discovery service.
        // Can be NULL/unset, in which case a builtin discovery service will be used.
        'certificate' => __DIR__ . '/cert/prod-signingcert03052025.cer',
        'signature.algorithm' => 'http://www.w3.org/2001/04/xmldsig-more#rsa-sha256',
        'attributes' => array('EmailAddress','FirstName','LastName')

    ),

);
