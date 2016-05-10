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
        $this->style = "height:400px";
        $this->title = $title;
    
        $this->data = "";
        
 } 
 
 public function setSize($width,$height){
 
 $this->size =  "width: ".$width."px; height: ".$height."px;";
 
 }
  
 public function show()
 {
 
          TScript::create("
           
        <!-- Prepare a Dom with size (width and height) for ECharts -->
      
        <!-- ECharts import -->
        <script src='http://echarts.baidu.com/build/dist/echarts.js'></script>
        <script type='text/javascript'>
       
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
                      
                        // Initialize after dom ready
                    var myChart =  ec.init(document.getElementById('$this->id')); 
                    // Load data into the ECharts instance 
                    myChart.setOption(option); 
                    };
      
                }
                
            );
        </script>
     
     ");
   
     parent::show();
 }
   
 }