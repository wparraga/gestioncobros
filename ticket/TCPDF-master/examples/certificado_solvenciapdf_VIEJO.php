<?php
	require_once('tcpdf_include.php');
	include "../../../config/db.php";
	include "../../../config/conexion.php";
  $mesletra="";
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
	$pdf->AddPage('P', 'A4');

	$html='
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


      <table cellpadding="6px" border="0" width="100%">
        <tr>
           <td width="30%"></td>
           <td width="90%">'.$nombres.'</td> 
        </tr>
      </table>

      <table cellpadding="6px" border="0" width="100%">
        <tr>
           <td width="55%"></td>
           <td width="45%"></td> 
        </tr>
      </table>

      <table cellpadding="6px" border="0" width="100%">
        <tr>
           <td width="25%"></td>
           <td width="46%">'.$cedula.'</td> 
           <td width="25%">'.$cedulatri.'</td> 
        </tr>
      </table>

      <table cellpadding="6px" border="0" width="100%">
        <tr>
           <td width="55%"></td>
           <td width="45%"></td> 
        </tr>
      </table>

      <table cellpadding="6px" border="0" width="100%">
        <tr>
           <td width="10%"></td>
           <td width="10%"></td> 
        </tr>
      </table>

       <table cellpadding="6px" border="0" width="100%">
        <tr>
           <td width="15%"></td>
           <td width="85%"></td> 
        </tr>
      </table>

      <table cellpadding="7px" border="0" width="100%">
        <tr>
           <td width="22%"></td>
           <td width="18%"></td> 
           <td width="15%"></td> 
           <td width="25%"></td> 
           <td width="20%"></td> 
        </tr>
      </table>

       <table cellpadding="6px" border="0" width="100%">
        <tr>
           <td width="10%"></td>
           <td width="90%"></td> 
        </tr>
      </table>

      <br>

      <table cellpadding="6px" border="0" width="100%">
        <tr>
           <td width="85%"></td>
           <td width="15%"></td> 
        </tr>
      </table>

       <table cellpadding="6px" border="0" width="100%">
        <tr>
           <td width="85%"></td>
           <td width="15%"></td> 
        </tr>
      </table>

       <table cellpadding="6px" border="0" width="100%">
        <tr>
           <td width="85%"></td>
           <td width="15%"></td> 
        </tr>
      </table>

      <br><br>
      
       <table cellpadding="6px" border="0" width="100%">
        <tr>
           <td width="85%"></td>
           <td width="15%"><strong style="font-size:12px"></strong></td> 
        </tr>
      </table>

      <br><br><br><br>

      <table cellpadding="6px" border="0" width="100%">
        <tr>
           <td width="60%"></td>
           <td width="20%">'.$dia.' de '.$mesletra.'</td>
           <td width="5%"></td> 
           <td width="10%"></td>
           <td width="5%"></td>
           <td style="text-align:right;" width="5%"></td> 
        </tr>
      </table>
       

        ';
     $pdf->writeHTML($html, true, false, true, false, '');
     $pdf->Output('certificado_solvencia.pdf', 'I');
