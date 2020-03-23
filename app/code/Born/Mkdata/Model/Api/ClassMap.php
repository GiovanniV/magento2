<?php

namespace Born\Mkdata\Model\Api;

/**
 * Class which returns the class map definition
 * @package
 */
class ClassMap
{
    /**
     * Returns the mapping between the WSDL Structs and generated Structs' classes
     * This array is sent to the \SoapClient when calling the WS
     * @return string[]
     */
    final public static function get()
    {
        return array(
            'GetEntry' => '\\Born\\Mkdata\\Model\\Api\\StructType\\GetEntry',
            'DPLv3_1Credentials' => '\\Born\\Mkdata\\Model\\Api\\StructType\\DPLv31Credentials',
            'GetEntryResponse' => '\\Born\\Mkdata\\Model\\Api\\StructType\\GetEntryResponse',
            'DPLv3_1Entry' => '\\Born\\Mkdata\\Model\\Api\\StructType\\DPLv31Entry',
            'ArrayOfFederalRegisterNotice' => '\\Born\\Mkdata\\Model\\Api\\ArrayType\\ArrayOfFederalRegisterNotice',
            'FederalRegisterNotice' => '\\Born\\Mkdata\\Model\\Api\\StructType\\FederalRegisterNotice',
            'SearchDpl' => '\\Born\\Mkdata\\Model\\Api\\StructType\\SearchDpl',
            'Search' => '\\Born\\Mkdata\\Model\\Api\\StructType\\Search',
            'ArrayOfGroup' => '\\Born\\Mkdata\\Model\\Api\\ArrayType\\ArrayOfGroup',
            'Group' => '\\Born\\Mkdata\\Model\\Api\\StructType\\Group',
            'ArrayOfMatch' => '\\Born\\Mkdata\\Model\\Api\\ArrayType\\ArrayOfMatch',
            'Match' => '\\Born\\Mkdata\\Model\\Api\\StructType\\Match',
            'SearchDplResponse' => '\\Born\\Mkdata\\Model\\Api\\StructType\\SearchDplResponse',
            'DPLv3_1Report' => '\\Born\\Mkdata\\Model\\Api\\StructType\\DPLv31Report',
            'ArrayOfDPLv3_1Entry' => '\\Born\\Mkdata\\Model\\Api\\ArrayType\\ArrayOfDPLv31Entry',
            'LastUpdate' => '\\Born\\Mkdata\\Model\\Api\\StructType\\LastUpdate',
            'LastUpdateResponse' => '\\Born\\Mkdata\\Model\\Api\\StructType\\LastUpdateResponse',
            'LicenseRequired' => '\\Born\\Mkdata\\Model\\Api\\StructType\\LicenseRequired',
            'LicenseRequiredResponse' => '\\Born\\Mkdata\\Model\\Api\\StructType\\LicenseRequiredResponse',
            'LinceseRequiredResult' => '\\Born\\Mkdata\\Model\\Api\\StructType\\LinceseRequiredResult',
            'IsCountryEmbargoed' => '\\Born\\Mkdata\\Model\\Api\\StructType\\IsCountryEmbargoed',
            'IsCountryEmbargoedResponse' => '\\Born\\Mkdata\\Model\\Api\\StructType\\IsCountryEmbargoedResponse',
            'GetUserDetails' => '\\Born\\Mkdata\\Model\\Api\\StructType\\GetUserDetails',
            'GetUserDetailsResponse' => '\\Born\\Mkdata\\Model\\Api\\StructType\\GetUserDetailsResponse',
            'DPLv3_1User' => '\\Born\\Mkdata\\Model\\Api\\StructType\\DPLv31User',
            'GetCodeDetails' => '\\Born\\Mkdata\\Model\\Api\\StructType\\GetCodeDetails',
            'GetCodeDetailsResponse' => '\\Born\\Mkdata\\Model\\Api\\StructType\\GetCodeDetailsResponse',
            'code' => '\\Born\\Mkdata\\Model\\Api\\StructType\\Code',
            'GetCountryDetails' => '\\Born\\Mkdata\\Model\\Api\\StructType\\GetCountryDetails',
            'GetCountryDetailsResponse' => '\\Born\\Mkdata\\Model\\Api\\StructType\\GetCountryDetailsResponse',
            'country' => '\\Born\\Mkdata\\Model\\Api\\StructType\\Country',
            'DelistDynamicScreeningListEntry' => '\\Born\\Mkdata\\Model\\Api\\StructType\\DelistDynamicScreeningListEntry',
            'DelistDynamicScreeningListEntryResponse' => '\\Born\\Mkdata\\Model\\Api\\StructType\\DelistDynamicScreeningListEntryResponse',
            'GetAliases' => '\\Born\\Mkdata\\Model\\Api\\StructType\\GetAliases',
            'GetAliasesResponse' => '\\Born\\Mkdata\\Model\\Api\\StructType\\GetAliasesResponse',
            'AddDynamicScreeningListEntry' => '\\Born\\Mkdata\\Model\\Api\\StructType\\AddDynamicScreeningListEntry',
            'AddDynamicScreeningListEntryResponse' => '\\Born\\Mkdata\\Model\\Api\\StructType\\AddDynamicScreeningListEntryResponse',
            'UpdateDynamicScreeningListEntry' => '\\Born\\Mkdata\\Model\\Api\\StructType\\UpdateDynamicScreeningListEntry',
            'UpdateDynamicScreeningListEntryResponse' => '\\Born\\Mkdata\\Model\\Api\\StructType\\UpdateDynamicScreeningListEntryResponse',
            'GetDynamicScreeningListEntry' => '\\Born\\Mkdata\\Model\\Api\\StructType\\GetDynamicScreeningListEntry',
            'GetDynamicScreeningListEntryResponse' => '\\Born\\Mkdata\\Model\\Api\\StructType\\GetDynamicScreeningListEntryResponse',
            'DynamicScreeningEntity' => '\\Born\\Mkdata\\Model\\Api\\StructType\\DynamicScreeningEntity',
            'ClearMatch' => '\\Born\\Mkdata\\Model\\Api\\StructType\\ClearMatch',
            'ClearMatchResponse' => '\\Born\\Mkdata\\Model\\Api\\StructType\\ClearMatchResponse',
            'GroupFactory' => '\\Born\\Mkdata\\Model\\Api\\StructType\\GroupFactory',
            'GroupFactoryResponse' => '\\Born\\Mkdata\\Model\\Api\\StructType\\GroupFactoryResponse',
            'GetLogs' => '\\Born\\Mkdata\\Model\\Api\\StructType\\GetLogs',
            'GetLogsResponse' => '\\Born\\Mkdata\\Model\\Api\\StructType\\GetLogsResponse',
            'ArrayOfLog' => '\\Born\\Mkdata\\Model\\Api\\ArrayType\\ArrayOfLog',
            'Log' => '\\Born\\Mkdata\\Model\\Api\\StructType\\Log',
            'Up' => '\\Born\\Mkdata\\Model\\Api\\StructType\\Up',
            'UpResponse' => '\\Born\\Mkdata\\Model\\Api\\StructType\\UpResponse',
        );
    }
}
