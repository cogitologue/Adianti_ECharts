<?php
class EChartRadarView extends TPage
{
    private $html;
    
    /**
     * Class constructor
     * Creates the page
     */
    function __construct()
    {
        parent::__construct();
        
      
    
        $radar = new EC_radar('Radar' );
       
        $radar->setSize(500,500);
        
        parent::add($radar);
    }
}
?>