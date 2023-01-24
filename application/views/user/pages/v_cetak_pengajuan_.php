<!DOCTYPE html>
<html>
<head>
  <title>Report Table</title>
  <style type="text/css">
    #outtable{
      padding: 20px;
      border:1px solid #e3e3e3;
      width:600px;
      border-radius: 5px;
    }
 
    .short{
      width: 50px;
    }
 
    .normal{  
      width: 150px;
    }
 
    table{
      border-collapse: collapse;
      font-family: arial;
      color:#5E5B5C;
    }
 
    thead th{
      text-align: left;
      padding: 10px;
    }
 
    tbody td{
      border-top: 1px solid #e3e3e3;
      padding: 10px;
    }
 
    tbody tr:nth-child(even){
      background: #F6F5FA;
    }
 
    tbody tr:hover{
      background: #EAE9F5
    }
  </style>
</head>
<body>
	<div id="outtable">
	  <table>
	  	<thead>
	  		<tr>
	  			<th class="short">#</th>
	  			<th class="normal">Instansi</th>
	  			<th class="normal">Status Pengajuan</th>
	  			<th class="normal">Luasan Bidang Tanah</th>
	  		</tr>
	  	</thead>
	  	<tbody>
	  		<?php $no=1; ?>
	  		  <tr>
	  			<td><?php echo $no; ?></td>
	  			<td><?php echo $pengajuan['nama_lengkap']; ?></td>
	  			<td><?php echo $pengajuan['status']; ?></td>
	  			<td><?php echo $pengajuan['luas']; ?></td>
	  		  </tr>
	  		<?php $no++; ?>	
	  	</tbody>
	  </table>
	 </div>
</body>
</html>