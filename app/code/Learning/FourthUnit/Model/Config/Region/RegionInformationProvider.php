<?php
namespace Learning\FourthUnit\Model\Config\Region;
class RegionInformationProvider
{
protected $countryInformationAcquirer;
protected $addressRepository;
public function __construct(\Magento\Directory\Api\CountryInformationAcquirerInterface $countryInformationAcquirer)
{
$this->countryInformationAcquirer = $countryInformationAcquirer;
}
public function toOptionArray()
{
$countries = $this->countryInformationAcquirer->getCountriesInfo();
foreach ($countries as $country) {
// Get regions for this country:
$regions = [];
if ($availableRegions = $country->getAvailableRegions()) {
foreach ($availableRegions as $region) {
$regions[] = [
'value' => $region->getName(),
'label' => $region->getName()
];
}
}
}

return $regions;
}
}
