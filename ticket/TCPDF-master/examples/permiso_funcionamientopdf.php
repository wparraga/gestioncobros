<?php
	require_once('tcpdf_include.php');
	include "../../../config/db.php";
	include "../../../config/conexion.php";


	$perfun_codigo=($_GET['perfun_codigo']);

	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('GESTIONES GAD');
	$pdf->SetTitle('Permiso de Funcionamiento GAD Flavio Alfaro');
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

	$sql1 = mysqli_query($con, "SELECT * FROM permiso_funcionamiento WHERE perfun_codigo = '$perfun_codigo'");
	if($usuarios = mysqli_fetch_array($sql1)) {							
    $perfun_fechaemision = $usuarios['perfun_fechaemision'];
		$perfun_persona = $usuarios['perfun_persona'];
		$perfun_cedularuc = $usuarios['perfun_cedularuc'];
		$perfun_actividad = $usuarios['perfun_actividad'];
		$perfun_ubicacion = $usuarios['perfun_ubicacion'];
    $perfun_valido = $usuarios['perfun_valido'];
    $perfun_usuario = $usuarios['perfun_usuario'];
	}
  $fechaentera=strtotime($perfun_fechaemision);

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
             <h4 align="center">COMISARÍA MUNICIPAL DEL CANTÓN FLAVIO ALFARO</h4>
            <br>
            <br>

            <h2 align="center">PERMISO DE FUNCIONAMIENTO</h2>
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
                <th width="100%"><h4>Se extiende el PERMISO DE FUNCIONAMIENTO DE LA VÍA PÚBLICA A:</h4></th>
              </tr>
              <tr >
                <th width="100%">'.$perfun_persona.'</th>
              </tr>
              <tr>
                <td width="100%"><h4>Ced. Identidad:</h4></td>
              </tr>
              <tr>
                <td width="100%">'.$perfun_cedularuc.'</td>
              </tr>
              <tr>
                <th width="16%"><h4>A la venta de:</h4></th>  
                <td width="84%">'.$perfun_actividad.'</td>                
              </tr>
              <tr>
                <td width="16%"><h4>Ubicado en:</h4></td>
                <td width="84%">'.$perfun_ubicacion.'</td> 
              </tr>
              <tr>
                <td width="95%"><h4>Dicho puesto esta bajo mi inspección</h4></td>
                <td width="5%"></td>
              </tr>
              <tr>
                <td width="16%"><h4>Válido hasta</h4></td>
                <td width="84%">'.$perfun_valido.'</td>
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
              <tr>
                <td width="100%" align="center"><h5>Atentamente,</h5> </td>
              </tr>
              <br>
              <br>
              <br>
              <br>
              <br>
              <tr>
                <td width="100%" align="center">_________________________________________ </td>
              </tr>
              <tr>
                <td width="100%" align="center"><h5>COMISARIO MUNICIPAL DE FLAVIO ALFARO</h5> </td>
              </tr>

            </table>
';
     $pdf->writeHTML($html, true, false, true, false, '');
     $pdf->Output('certificado_solvencia.pdf', 'I');
