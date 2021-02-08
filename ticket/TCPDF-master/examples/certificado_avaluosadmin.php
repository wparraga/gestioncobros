<?php
  require_once('tcpdf_include.php');
  include "../../../config/db.php";
  include "../../../config/conexion.php";
  /*$mesletra="";
  $mes=date('m');
  $dia=date('d');
  $ann=date('Y');
  $an = $ann[2].$ann[3];
  if($mes=='01'){
    $mesletra="Enero";
  }else if($mes=='02'){
    $mesletra="Febrero";
  }else if($mes=='03'){
    $mesletra="Marzo";
  }else if($mes=='04'){
    $mesletra="Abri";
  }else if($mes=='05'){
    $mesletra="Mayo";
  }else if($mes=='06'){
    $mesletra="Junio";
  }else if($mes=='07'){
    $mesletra="Julio";
  }else if($mes=='08'){
    $mesletra="Agosto";
  }else if($mes=='09'){
    $mesletra="Septiembre";
  }else if($mes=='10'){
    $mesletra="Octubre";
  }else if($mes=='11'){
    $mesletra="Noviembre";
  }else if($mes=='12'){
    $mesletra="Diciembre";
  }
*/
  $id_certificadoavaluos=($_GET['id_certificadoavaluos']);

  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  $pdf->SetCreator(PDF_CREATOR);
  $pdf->SetAuthor('GESTIONES GAD');
  $pdf->SetTitle('Certificado de Avalúos GAD Flavio Alfaro');
  $pdf->SetSubject('GESTIONES GAD');
  $pdf->SetKeywords('GESTIONES GAD');
  $pdf->setPrintHeader(false);
  $pdf->setPrintFooter(false);
  $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);


// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetMargins(15, 45, 1);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);


  
  if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
      require_once(dirname(__FILE__).'/lang/eng.php');
      $pdf->setLanguageArray($l);
  }


  $pdf->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');
  $pdf->SetFont('times', '', 11);

  $sql1 = mysqli_query($con, "SELECT * FROM certificado_avaluos WHERE cerava_codigo='$id_certificadoavaluos'");
  if($usuarios = mysqli_fetch_array($sql1)) {
    $fec = $usuarios['cerava_fechaemision'];            
    $pre = $usuarios['cerava_tipopredio'];
    $per = $usuarios['cerava_persona'];
    $ubi = $usuarios['cerava_ubicacion'];
    $avn = $usuarios['cerava_avaluonumero'];
    $avl = $usuarios['cerava_avaluoletras'];
    $obs = $usuarios['cerava_observacion'];
    $usu = $usuarios['cerava_usuario'];
    $seradm = $usuarios['cerava_seradm'];
  }
  $sql="SELECT * FROM users WHERE user_name='$usu'";
  $query = mysqli_query($con, $sql);             
  if($row=mysqli_fetch_array($query)){
    $nombres=$row['firstname'].' '.$row['lastname'];
  }

  $fechaComoEntero = strtotime($fec);
  $mesletra="";
  $mes=date('m', $fechaComoEntero);
  $dia=date('d', $fechaComoEntero);
  $ann = date("Y");
  $h = date("H");
  $ii = date("i");
  $s = date("s");
  if($mes=='01'){
    $mesletra="Enero";
  }else if($mes=='02'){
    $mesletra="Febrero";
  }else if($mes=='03'){
    $mesletra="Marzo";
  }else if($mes=='04'){
    $mesletra="Abri";
  }else if($mes=='05'){
    $mesletra="Mayo";
  }else if($mes=='06'){
    $mesletra="Junio";
  }else if($mes=='07'){
    $mesletra="Julio";
  }else if($mes=='08'){
    $mesletra="Agosto";
  }else if($mes=='09'){
    $mesletra="Septiembre";
  }else if($mes=='10'){
    $mesletra="Octubre";
  }else if($mes=='11'){
    $mesletra="Noviembre";
  }else if($mes=='12'){
    $mesletra="Diciembre";
  }
  $pdf->AddPage('P', 'A4');

  $html = '
            <style>
                .row td{
                    text-align: right;
                }
                h1{
                    font-size:25px;
                }
                .font10px{
                    font-size:10px;
                }
                .font12px{
                    font-size:12px;
                }
                .td{
                    border: 1px solid black;
                    text-align: CENTER;
                    height: 18px;
                    font-weight: bold;
                    vertical-align: middle;
                }
                .div100{
                    width:100%;
                    height:20px;
                }
                .text_right{
                    text-align: right;
                }
                .text_center{
                    text-align: center;
                }
            </style>
            <br>
            <br>
            <br>
            <br>
            <br>
     
            <table border="0" cellpadding="0" class="row">
                <tr>
                    <td>
                        <span>Generado por: <strong>'.$nombres.'</strong> </span><br>
                    </td>
                </tr>
                
            </table>
            <h2 align="center">CERTIFICADO DE AVALUO CATASTRAL</h2>
            <table border="0" cellpadding="2" class="row">
                <tr>
                    <td>  
                    </td>
                </tr>
                <tr>
                    <td >
                        
                    </td>
                </tr>
                <tr>
                    <td >
                       
                    </td>
                </tr>
            </table>
            <table border="0" cellpadding="2">
                <tr >
                    <td >      
                    </td>
                </tr>
                <tr >
                    <td >
                        <span class="font12px">EL</span>
                    </td> 
                </tr>

                <tr>
                    <td >
                        <span class="font12px">JEFE DE AVALÚOS Y CATASTROS</span>

                    </td>
                </tr>

                <tr>
                    <td >
                        <span class="font12px">CERTIFICA</span>

                    </td>
                </tr>
                <tr >
                    <td >

                        
                    </td>

                </tr>
                <tr>
                    <td align="justify">
                        <span class="font12px">Que la propiedad '.$pre.' del Señor(a): '.$per.' ubicada en: '.$ubi.' tiene el avaluo catastral de: '.'$ '.$avn.'('.$avl.') </span>

                    </td>
                </tr>
                <tr >
                    <td >

                        
                    </td>

                </tr>




                <tr >
           
                    <td >
                        <table  cellpadding="4">
         
                        </table>
                        
                    </td>

                </tr>
        
    <tr>
                    <td >
                       <strong>OBSERVACION:  </strong>
                    </td>              

                </tr>
    <tr>
        <td>
      '.$obs.'
        </td>
    </tr>
        <tr>
          <td>

          </td>
        </tr>


                   <tr >
                    <td >
                        <table class="row" cellpadding="2">
                            <tr>
                                <td >
                                    <span class="font12px">Flavio Alfaro '.$dia.' de '.$mesletra.' del '.$ann.'</span>
                                </td>
                         
                            </tr>
                        </table>
                        
                    </td>

                </tr>
                 <tr >
                    <td >

                        
                    </td>

                </tr>
                 <tr >
                    <td class="text_center">

                        <span >LO CERTIFICO EN HONOR A LA VERDAD</span>
                    </td>

                </tr>
                 <tr >
                    <td >

                        
                    </td>

                </tr>
                <tr >
                    <td >

                        
                    </td>

                </tr>
                 <tr >
                    <td >

                        <table cellpadding="2">
                            <tr>
                                <td >

                                    
                                </td>
                  
                                <td class="text_center">
                                        _______________________________ <br>
                                        JEFA DE AVALÚOS Y CATASTROS
                                    
                                </td>
                                <td >

                     
                                    
                                </td>
                         
                            </tr>
                        </table>
                    </td>

                </tr>
                 <tr >
                    <td >

                        
                    </td>

                </tr>
             

 
            </table>
';
     $pdf->writeHTML($html, true, false, true, false, '');
     $pdf->Output('certificado_avaluos.pdf', 'I');
