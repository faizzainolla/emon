<!DOCTYPE html>
<html>
<head>
   <title><?php echo $title;?></title>
  <style type="text/css">
@page {
  margin: 1cm 1cm 1cm 1cm ;
}
body {
  font-family: sans-serif;
  margin: 2cm 0;
  text-align: justify;
}
#header,
#footer {
  position: fixed;
  left: 0;
  right: 0;
  color: #aaa;
  font-size: 0.7em;
}
#header {
  top: 0;
  border-bottom: 0.1pt solid #aaa;
}
#footer {
  bottom: 0;
  border-top: 0.1pt solid #aaa;
}



.page-number {
  text-align: left;
}
.page-number:after {

  content: "Halaman " counter(page);
}
hr {
  page-break-after: always;
  border: 0;
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
      width: 100%;
    }
 
    thead th{
      text-align: left;
      padding: 10px;
    }
 
    tbody td{
      border-top: 1px solid #e3e3e3;
      padding: 10px;
    }
 
 
    tbody tr:hover{
      background: #EAE9F5
    }
    .cn{
    top:12px;
    left: 60px;
    position: fixed;
    font-size: 1em;
    color: #215;
    font-weight: bold;

  }
    .ca{
    top:25px;
    left: 60px;
    position: fixed;
    font-size: 0.8em;
  }
   .ct{
    top:35px;
    left: 60px;
    position: fixed;
    font-size: 0.8em;
  }
    .nmwil{
   
    font-size: 0.7em;
    font-weight: bold;

  }
   

  </style>
</head>
<body>
<div id="header">
    <img src="<?php echo base_url()?>assets/img/msm.png" width='50px' style="margin-top:10px;"/>
    <div class="cn">MSM Consultant</div>
    <div class="ca">Jln. T. Nyak Arief No.160 Jeulingke - Banda Aceh</div>
    <div class="ct">Telp / Fax : (0651) 7555559  | Email : qa.msmaceh@gmail.com | Website : www.msmaceh.com </div>
    <div>&nbsp;</div>
   
</div>
 
  <div class="nmwil"> <?php 
   $wil = $q->row_array();
   echo "Wilayah Kerja : ". $wil['nmwil'];
   echo "<br>Project : ". $wil['nmsys'];
   
  ?> </div>
  <div>&nbsp;</div>
 

  <?php 

   $v =" <table style='font-size:8px;' style='display:none' 
         class='table table-bordered table-striped table-hover table-heading table-datatable' id='datatable-4'>
          <thead style='background-color: #e5e5e5;'>
            <tr>
              <th width='35%'>Nama Modul</th>
              <th width='15%'>Link</th>
              <th width='10%'>Last Update</th>
              <th width='40%'>Fitur</th>
              </tr>
          </thead>
          <tbody>";
         
         foreach ($q->result_array() as $row)
          { 

            if($row['url']==''){
              $viewfitur ='';
              $viewlog ='';
              $bold ='<b>';
              $tglfix ='';

            }else{
             
              $bold='';
              $tglfix=$row['last_update'];
              }

            if($row['LEVEL']=='1' ){
              $spasi='&nbsp;';
              }
            if($row['LEVEL']=='2' ){
              $spasi='&nbsp;&nbsp;&nbsp;&nbsp;';
              }
            if($row['LEVEL']=='3'){
              $spasi='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
              }
            if($row['LEVEL']=='4'){
              $bold='';
              $spasi='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
              }
              $idmodul=$row['id'];
               $kds=$row['kd_sistem'];
                $kdw=$row['kd_wilayah'];

             
           $sql1 = $this->db->query("SELECT fitur FROM ms_fitur WHERE id_modul= '$idmodul' AND  kd_wilayah='$kdw' AND  kd_system='$kds'");
            $fitur='';
           
            if($sql1->num_rows()>0){
               foreach ($sql1->result_array() as $row2)
               {
                $fitur= $row2['fitur'];
                }
              
            }else{
              $fitur='Belum diupdate';
            }
           
          $v .="<tr>";
          $v .="<td>".$bold.$spasi.$row['Menu']."</td>";
          $v .="<td>".$bold.$row['url']."</td>";
          $v .="<td>".$tglfix."</td>";
          $v .="<td>".$fitur."</td>";
          $v .="</tr>";
          
           }
              
          
          $v .="  </tbody>
                  </table>";

        echo $v;
       ?>

       <div id='footer'>
          <div >
            <?php 
           echo "Wilayah Kerja : ". $wil['nmwil'];
           echo " | Project : ". $wil['nmsys']; 
            ?>

          </div>
       </div>

</body>
</html>