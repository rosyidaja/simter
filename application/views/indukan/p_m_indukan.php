<?php if(@$type!=="excel") { ?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Materi Indukan</title>
		<style>
		body{
			font-family: arial;
		}
		table, th, td {
		    border:1px solid black;
		}
		.a{
			text-align: center;
			font-size: 14px;
		}
		.b{
			text-align: center;
			font-size: 13px;
		}

		</style>
	</head>
	<body onload="window.print();">
<?php } else { ?>
	<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Materi Indukan</title>
	<style>
		.table{
			border-collapse:collapse;      
		}
	</style>
		<xml>
		 <x:ExcelWorkbook>
		  <x:ExcelWorksheets>
		   <x:ExcelWorksheet>
			<x:Name>Sheet</x:Name>
			<x:WorksheetOptions>
			 <x:Print>
				<x:Gridlines />
			 </x:Print>
			</x:WorksheetOptions>
		   </x:ExcelWorksheet>
		  </x:ExcelWorksheets>
		 </x:ExcelWorkbook>
		</xml>
	</head>
<?php } ?>
<table width="680" summary='Materi Indukan'>
	<caption>Materi Indukan</caption>
	<thead>
		<tr>
				<th scope="col" width="14%">
					KANDANG
				</th>
				<th scope="col" width="43%">
					J A N T A N
				</th>
				<th scope="col" width="43%">
					B E T I N A
				</th>
			</tr>
	</thead>
	<tbody>
		<?php foreach($data_print as $print) { ?>
		<tr>
				<td rowspan="2" align="center" style="font-size:24px;">
					<strong> <?php if($print->nama_kandang != ''){echo $print->nama_kandang;}else{  ?>&nbsp; <?php } ?> </strong>
				</td>
				<td class="a" >
					<strong><?php echo $print->ring_jantan; ?></strong>
				</td>
				<td class="a">
					<STRONG><?php echo $print->ring_betina; ?></STRONG>
				</td>
			</tr>
			<tr>
				<td class="b">
					<strong><?php if($print->prah_jantan != ''){echo $print->prah_jantan;}else{  ?>&nbsp; <?php } ?> </strong>
				</td>
				<td class="b">
					<strong><?php if($print->prah_betina != ''){echo $print->prah_betina;}else{  ?>&nbsp; <?php } ?> </strong>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</body>
</html>