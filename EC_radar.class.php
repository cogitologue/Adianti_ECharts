<?php

/**
 * PEntry Widget
 *
 * @version    3.0
 * @package    PWD
 * @subpackage form
 * @author     Alexandre Evangelista de Souza
 *@ description PieChart
 */
 
 class EC_radar extends TElement{
 
 private $cart;
 private $data;
 private $pieHole;
 private $title;
 private $size;
 
 public function __construct($title ){
 
   parent::__construct('div');


        $this->id = 'EC_radar'.uniqid();
        $this->style = "height:300px;width:300px";
        $this->title = $title;
    
        $this->data = "";
        
 } 
 
 public function setSize($width,$height){
 
 $this->size =  "width: ".$width."px; height: ".$height."px;";
 
 }
  
 public function show()
 {
   
//TPage::include_js('http://echarts.baidu.com/build/dist/echarts.js');
        TPage::include_js('app/lib/echarts-2.2.7/build/dist/echarts.js');
         TScript::create("
         
        // configure for module loader
        require.config({
            paths: {
                echarts: 'http://echarts.baidu.com/build/dist'
                
            }
        });
        
        // use
        require(
            [
                'echarts',
                'echarts/chart/bar' // require the specific chart type
            ],
            function (ec) {
                // Initialize after dom ready
                var myChart = ec.init(document.getElementById('$this->id')); 
                
                var option = {
                    tooltip: {
                        show: true
                    },
                    legend: {
                        data:['Sales']
                    },
                    xAxis : [
                        {
                            type : 'category',
                            data : ['Shirts', 'Sweaters', 'Chiffon Shirts', 'Pants', 'High Heels', 'Socks']
                        }
                    ],
                    yAxis : [
                        {
                            type : 'value'
                        }
                    ],
                    series : [
                        {
                            'name':'Sales',
                            'type':'bar',
                            'data':[5, 20, 40, 10, 10, 20]
                        }
                    ]
                };
                    clearTimeout(loadingTicket);
                loadingTicket = setTimeout(function (){
                myChart.hideLoading();
                myChart.setOption(option);
            },2200);
            
                // Load data into the ECharts instance 
                myChart.setOption(option); 

            }
        );
     
         ");
        TScript::create("
        
	 var loadingTicket;
        var effectIndex = -1;
        var effect = ['spin' , 'bar' , 'ring' , 'whirling' , 'dynamicLine' , 'bubble'];
 
        ");
   
     parent::show();
 }
   
 }