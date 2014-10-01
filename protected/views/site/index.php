<link rel="stylesheet" type="text/css" href="/zabit/themes/zabit/gridview/styles.css" />
<link rel="stylesheet" type="text/css" href="/zabit/themes/zabit/pager.css" />
<script
	type='text/javascript'
	src='<?php echo Yii::app()->request->baseUrl; ?>/js/highcharts.js'></script>
<script
	type='text/javascript'
	src='<?php echo Yii::app()->request->baseUrl; ?>/js/modules/exporting.js'></script>
	
	<script>

	function numberFormat_hc(number, decimals, dec_point, thousands_sep) {
		number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
		  var n = !isFinite(+number) ? 0 : +number,
		    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
		    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
		    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
		    s = '',
		    toFixedFix = function (n, prec) {
		      var k = Math.pow(10, prec);
		      return '' + Math.round(n * k) / k;
		    };
		  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
		  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
		  if (s[0].length > 3) {
		    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
		  }
		  if ((s[1] || '').length < prec) {
		    s[1] = s[1] || '';
		    s[1] += new Array(prec - s[1].length + 1).join('0');
		  }
		  return s.join(dec);
	}
	</script>

<?php
/* @var $this SiteController */

$this->pageTitle="Zabit! Take control of your bills.";

$today = date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s")));
$month_ago = date("Y-m-d H:i:s",strtotime($today." - 30 days"));


$model = Account::model()->findByPk(Yii::app()->user->id);
$accountItems = AccountItem::model()->findAllByAttributes(array('account_id'=>$model->id));
?>
<div style="padding-left: 0px">
<div id="tabs" style="width: 100%">
	<ul>
		<li><a href="#tabs-1"> Home </a></li>	
	</ul>
	<div id="tabs-1">
	<div class="flash-success" style="font-weight: bold;font-size: 14px;">
	<img src="images/icons/Orb info.png" width="20px">
	Current Balance : <span>$ <?php echo number_format($model->balance)?></span>
	</div>
	<table>
		<tr>
	<td colspan="2">
	<?php 
	
	$criteria = new CDbCriteria();
	$criteria->join = 'right join tbl_datelookup dl on date(create_date)=date(dl.date_dlp)';
	$criteria->select = 'sum(if(t.status=1 and t.user_id='.$model->id.',t.amount,0)) as sumc,dl.date_dlp as day,status';
 	$criteria->condition = '(dl.date_dlp <=:today and dl.date_dlp > :month_ago)';
 	$criteria->params = array('month_ago'=>$month_ago,'today'=>$today);
	$criteria->group = 'day';
	$criteria->order = 'day DESC';
	$criteria->limit = 30;
	$incomes = Income::model()->findAll($criteria);
	$costs = Cost::model()->findAll($criteria);
	$criteria = null;
	
	?>
	<script>
	$(function () {
        $('#payments').highcharts({
            chart: {
                type: 'spline'
            }, 
            colors: [
                     '#2875b9',
//                     '#b0c7ec',
//                     '#fa8100',
//                     '#fdbd6d',
//                     '#3aa100',
                    '#d12b21',
//                     '#9de07e',
                     '#fb9994',
//                     '#9265c3',
//                     '#c4afd8',
//                     '#8a5749',
//                     '#c29c92',
                     '#df77c7',
                     '#f4b6d4',
                     '#7f7f7f',
                     '#e2e2e2',
                     '#bcbe00',
                     '#dbdc81',
                     '#33bdd1',
                     '#a1d9e6',
              ],              
            title: {
                text: 'Balance Chart',
                x: -20 //center
            },
            subtitle: {
                text: 'Last Month Income & Cost',
                x: -20
            },
            xAxis: {
                categories: [
                             <?php
                             for($i=29;$i>=0;$i--){
									echo '"'.date("d M",strtotime($today.' -'.$i.' days')).'",';
								}
                             ?>
                             ],
                             labels: {
                                 rotation: -45,
                                 align: 'left',
                                 style: {
                                     fontSize: '9px',
                                     fontFamily: 'Verdana, sans-serif',
                                     direction: 'rtl',
                                 }
                             }                                                 
            },
            yAxis: {
                title: {
                    text: 'Income & Cost'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.x +'</b>: '+ numberFormat_hc(this.y) + " $";
                },                                
                valueSuffix: ' $'
            },
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom',
                borderWidth: 0
            },
            plotOptions: {
                area: {
                    lineWidth: 1,
                    states: {
                        hover: {
                            lineWidth: 1
                        }
                    },
                    marker: {
                        enabled: true
                    },
                }
            },
            exporting: {
 	             enabled: false
 	     	},   
            series: [
	        {
                name: 'Income',
                data: [<?php 
                foreach(array_reverse($incomes) as $income){
					if(isset($income->sumc)) echo $income->sumc; else echo 0;
					echo ',';
				}
                ?>]
            }, {
                name: 'Cost',
                data: [<?php 
                foreach(array_reverse($costs) as $cost){
					if(isset($cost->sumc)) echo $cost->sumc; else echo 0;
					echo ',';
				}
                ?>]
            }]
        });
    });
	</script>
	<div align="center">
	<div id="payments" align="center" style="width: 820px; height: 385px; margin: 0" dir="ltr"></div>
	</div>
	</td>
	</tr>
	<tr>
	<td style="text-align: right;font-weight:bold;">Incomes
	</td>
	<td style="text-align: right;font-weight:bold;">Costs
	</td>
	</tr>
	
	<tr>
	<td>
	<?php
	$criteria = new CDbCriteria();
	$criteria->join = 'inner join tbl_income i on t.income_id=i.id inner join tbl_income_type ty on i.income_type_id=ty.id';
 	$criteria->select = 'sum(t.creditor) as sumc,ty.name as tyname';
	$criteria->condition = 't.account_id = :account_id';
	$criteria->params = array('account_id'=>$model->id);	
	$criteria->group = 'ty.id';
	$criteria->order = 'sumc';
	$criteria->limit = 10;
	$accountItemsReport = AccountItem::model()->findAll($criteria);
	$criteria = null;

	
	?>
	<script>
  	$(function () {
  	    var chart;
  	    
  	    $(document).ready(function () {
  	    	
  	    	// Build the chart
  	        $('#income_types').highcharts({
  	            chart: {
  	                plotBackgroundColor: null,
  	                plotBorderWidth: null,
  	                plotShadow: false
  	            },
  	          colors: [
                       '#8a5749',
                       '#c29c92',
                       '#df77c7',
                       '#f4b6d4',
                       '#7f7f7f',
                       '#e2e2e2',
                       '#bcbe00',
                       '#dbdc81',
                       '#33bdd1',
                       '#a1d9e6',
                     '#2875b9',
                     '#b0c7ec',
                     '#fa8100',
                     '#fdbd6d',
                     '#3aa100',
                    '#d12b21',
                     '#9de07e',
                     '#fb9994',
                     '#9265c3',
                     '#c4afd8',
  	                   ],           
  	            title: {
  	                text: '',
  	                 style: {
  	                     display: 'none'
  					 }                               	  	                
  	            },
  	            tooltip: {
//  	        	    pointFormat: '{series.name}: <b>{point} </b>'
  	            },
  	            plotOptions: {
  	                pie: {
  	                    allowPointSelect: true,
  	                    cursor: 'pointer',
  	                    dataLabels: {
  	                        enabled: true
  	                    },
  	                    showInLegend: true
  	                }
  	            },
  	          	exporting: {
  	             enabled: false
  	     	 	},        	  	            
  	            series: [{
  	                type: 'pie',
  	                name: 'Income',
  	                data: [
  	   	                <?php
  	   	                foreach($accountItemsReport as $ai){
  	   	                	echo '["'.$ai->tyname.'",'.$ai->sumc.'],';
  	   	                }  	   	                 
  	   	                ?>
  	                ]
  	            }]
  	        });
  	    });
  	    
  	});
  	</script>
  	<div align="center" style="border-top: 1px dashed #ddd;">
  	<div id="income_types" align="center" style="width: 400px; height: 350px; margin: 0" dir="ltr"></div>
  	</div>
	</td>
	<td>
	<?php 
	$criteria = new CDbCriteria();
	$criteria->join = 'inner join tbl_cost c on t.cost_id=c.id inner join tbl_cost_type cy on c.cost_type_id=cy.id';
	$criteria->select = 'sum(t.debtor) as sumc,cy.name as cyname';
	$criteria->condition = 't.account_id = :account_id';
	$criteria->params = array('account_id'=>$model->id);
	$criteria->group = 'cy.id';
	$criteria->order = 'sumc';
	$criteria->limit = 10;
	$accountItemsDebtReport = AccountItem::model()->findAll($criteria);
	$criteria = null;
	
	?>
	<script>
  	$(function () {
  	    var chart;
  	    
  	    $(document).ready(function () {
  	    	
  	    	// Build the chart
  	        $('#types').highcharts({
  	            chart: {
  	                plotBackgroundColor: null,
  	                plotBorderWidth: null,
  	                plotShadow: false
  	            },
  	          colors: [
                       '#8a5749',
                       '#c29c92',
                       '#df77c7',
                       '#f4b6d4',
                       '#7f7f7f',
                       '#e2e2e2',
                       '#bcbe00',
                       '#dbdc81',
                       '#33bdd1',
                       '#a1d9e6',
                     '#2875b9',
                     '#b0c7ec',
                     '#fa8100',
                     '#fdbd6d',
                     '#3aa100',
                    '#d12b21',
                     '#9de07e',
                     '#fb9994',
                     '#9265c3',
                     '#c4afd8',
  	                   ],           
  	            title: {
  	                text: '',
  	                 style: {
  	                     display: 'none'
  					 }                               	  	                
  	            },
  	            tooltip: {
//  	        	    pointFormat: '{series.name}: <b>{point} </b>'
  	            },
  	            plotOptions: {
  	                pie: {
  	                    allowPointSelect: true,
  	                    cursor: 'pointer',
  	                    dataLabels: {
  	                        enabled: true
  	                    },
  	                    showInLegend: true
  	                }
  	            },
  	          	exporting: {
  	             enabled: false
  	     	 	},        	  	            
  	            series: [{
  	                type: 'pie',
  	                name: 'types',
  	                data: [
  	                     <?php
  	     	   	                foreach($accountItemsDebtReport as $ai){
  	     	   	                	echo '["'.$ai->cyname.'",'.$ai->sumc.'],';
  	     	   	                }  	   	                 
  	     	   	           ?>
  	                ]
  	            }]
  	        });
  	    });
  	    
  	});
  	</script>
  	<div align="center" style="border-top: 1px dashed #ddd;">
  	<div id="types" align="center" style="width: 400px; height: 350px; margin: 0" dir="ltr"></div>
  	</div>
	</td>
	</tr>
	<tr>
	<td style="vertical-align: top;width: 50%;"><div id="account-grid" class="grid-view">
			<table class="items">
				<thead>
					<tr>
						<th>Desciption</th>
						<th>Income</th>
						<th>Date</th>
					</tr>
				<thead>
					<?php foreach($accountItems as $item){
					if($item->debtor==0){?>
					<tr class="even" style="color: green">
						<td><?php echo $item->description;?></td>
						<td>$ <?php echo number_format($item->creditor);?></td>
						<td><?php echo date("H:i:s Y/m/d",strtotime($item->create_date));?></td>
					</tr>
					<?php }}?>
			</table>
		</div></td>
	<td style="vertical-align: top;width: 50%;"><div id="account-grid" class="grid-view">
			<table class="items">
				<thead>
					<tr>
						<th>Description</th>
						<th>Income</th>
						<th>Date</th>
					</tr>
				<thead>
					<?php foreach($accountItems as $item){
					if($item->debtor!=0){?>
						<tr class="odd" style="color: red">
						<td><?php echo $item->description;?></td>
						<td>$ <?php echo number_format($item->debtor);?></td>
						<td><?php echo date("H:i:s Y/m/d",strtotime($item->create_date));?></td>
					</tr>
					<?php }}?>
			</table>
		</div></td>
	</tr>
	</table>
	</div></div>
</div>