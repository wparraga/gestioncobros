<?php
	require_once('tcpdf_include.php');
	include "../../../config/db.php";
	include "../../../config/conexion.php";


	$id_solvenciatra=($_GET['id_solvenciatra']);

	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('GESTIONES GAD');
	$pdf->SetTitle('Certificado de Solvencia ANT GAD Flavio Alfaro');
	$pdf->SetSubject('GESTIONES GAD');
	$pdf->SetKeywords('GESTIONES GAD');
	$pdf->setPrintHeader(false);
	$pdf->setPrintFooter(false);
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
	
	if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    	require_once(dirname(__FILE__).'/lang/eng.php');
    	$pdf->setLanguageArray($l);
	}


	$pdf->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');
	$pdf->SetFont('times', '', 12);

	$sql1 = mysqli_query($con, "SELECT * FROM solvencia_transito WHERE codigo = '$id_solvenciatra'");
	if($usuarios = mysqli_fetch_array($sql1)) {							
		$nombres = $usuarios['nombres'];
		$cedula = $usuarios['cedula'];
		$cedulatri = $usuarios['cedulatributaria'];
		$fecha = $usuarios['fecha'];
	}
  $fechaentera=strtotime($fecha);

  $mesletra="";
  $mes=date('m',$fechaentera);
  $dia=date('d',$fechaentera);
  $ann=date('Y',$fechaentera);
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
            <br>
            <br>
             <h4 align="center">Dirección de Tránsito Transporte Terrestre y Seguridad Vial</h4>
            <br>
            <br>

            <h2 align="center">CERTIFICADO DE SOLVENCIA</h2>
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
            <table cellpadding="6px" border="0" width="100%">
              <tr>
                <th width="24%"><h4>Certifico que el señor:</h4></th>
                <th width="76%"> '.$nombres.'</th>
              </tr>
              <tr >
                <td width="80%"><h4>No adeuda a este Municipio a la fecha.</h4></td>
                <td width="20%"></td>
              </tr>
              <tr>
                <td width="18%"><h4>Ced. Identidad:</h4></td>
                <td width="20%">'.$cedula.'</td>
                <td width="23%"><h4>Ced. Tributaria Nro.</h4></td>
                <td width="39%">'.$cedulatri.'</td>
              </tr>
              <tr>
                <th width="78%"><h4>Cobro por TASA Administrativa según Resolución Nro. 482 D-ANT-2015.</h4></th>  
                <td width="22%"><h4>VALOR $6.00</h4></td>                
              </tr>
              <tr>
                <td>
  
                </td>
              </tr>
              <tr>
                <td>

                </td>
              </tr>
              <tr>
                <td width="10%"></td>
                <td width="90%" align="right"><h4>Flavio Alfaro, '.$dia.' de '.$mesletra.' del '.$ann.'</h4></td>
              </tr>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <tr>
                <td width="100%" align="center">____________________________ </td>
              </tr>
              <tr>
                <td width="100%" align="center"><h4>TESORERO MUNICIPAL</h4> </td>
              </tr>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <tr >
                <td width="100%" align="center"><h4>VÁLIDO POR TREINTA DÍAS</h4></td>
              </tr>
            </table>
';
     $pdf->writeHTML($html, true, false, true, false, '');
     $pdf->Output('certificado_solvencia.pdf', 'I');
