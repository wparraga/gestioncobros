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
  $id_tramite=($_GET['id_tramite']);

  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  $pdf->SetCreator(PDF_CREATOR);
  $pdf->SetAuthor('GESTIONES GAD');
  $pdf->SetTitle('Trámites GAD Flavio Alfaro');
  $pdf->SetSubject('GESTIONES GAD');
  $pdf->SetKeywords('GESTIONES GAD');
  $pdf->setPrintHeader(false);
  $pdf->setPrintFooter(false);
  $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);


// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetMargins(15, 8, 15);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);


  
  if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
      require_once(dirname(__FILE__).'/lang/eng.php');
      $pdf->setLanguageArray($l);
  }


  $pdf->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');
  $pdf->SetFont('times', '', 11);

  $sql1 = mysqli_query($con, "SELECT * FROM titulo_credito WHERE tit_codigo='$id_tramite'");
  if($usuarios = mysqli_fetch_array($sql1)) {
    $tit_fechaemision = $usuarios['tit_fechaemision'];            
    $tit_fecharecaudacion = $usuarios['tit_fecharecaudacion'];
    $tit_nrotitulo = $usuarios['tit_nrotitulo'];
    $tit_tipotramite = $usuarios['tit_tipotramite'];
    $tit_cedularuc = $usuarios['tit_cedularuc'];
    $tit_contribuyente = $usuarios['tit_contribuyente'];
    $tit_servicioadministrativo = $usuarios['tit_servicioadministrativo'];
    $tit_valimpuesto = $usuarios['tit_valimpuesto'];
    $tit_valespecie = $usuarios['tit_valespecie'];
    $tit_valtotal = $usuarios['tit_valtotal'];
    $tit_estado = $usuarios['tit_estado'];
    $tit_usuariogenera = $usuarios['tit_usuariogenera'];
    $tit_usuarioemite = $usuarios['tit_usuarioemite'];
  }

  $sql="SELECT * FROM users WHERE user_name='$tit_usuarioemite'";
  $query = mysqli_query($con, $sql);             
  if($row=mysqli_fetch_array($query)){
    $nombres=$row['firstname'].' '.$row['lastname'];
  }
  $pdf->AddPage('P', 'A4');

   $html='
                <table width="100%" border="1" >
                   <tr>
                    <td ROWSPAN="2" width="12%" align="center">
                      <br><br><img src="images/alpha.jpg" border="0" height="40" width="30" />
                    </td>
                    <td width="88%" colspan="0"><h4 align="center">GOBIERNO AUTÓNOMO DESCENTRALIZADO <br>MUNICIPAL DEL CANTÓN FLAVIO ALFARO</h4>
                    </td>
                   </tr>
                   <tr>
                      <td align="center"><h5><strong>Dirección: </strong>Calle Amazonas y Agustin Zambrano <strong>/ Teléfono:</strong>2353-691 / Correo: alcaldia@flavioalfaro.gob.ec</h5>
                        <h5><strong>RUC:</strong>1360000284001</h5></td>
                   </tr>
                </table>                       
                <br>
                <table border="0" >
                   <tr align="left">
                      <td width="100%" colspan="2"><strong>NRO.: '.$tit_nrotitulo.'</strong></td>
                   </tr>
                </table>

                <table border="1" >
                   <tr align="center">
                      <td colspan="3"><strong>CONTRIBUYENTE</strong></td>
                      <td><strong>CEDULA #</strong></td>
                   </tr>
                   <tr >
                      <td align="center" colspan="3">'. $tit_contribuyente.'</td>
                      <td align="center">'. $tit_cedularuc.'</td>
                   </tr>
                </table>
                <table border="1" >
                   <tr align="center">
                      <td width="25%" align="left"><strong> Fecha Generado</strong></td>
                      <td width="25%" align="left"> '. $tit_fechaemision.'</td>
                      <td width="25%" align="left"><strong> Usuario Generado</strong></td>
                      <td width="25%" align="left"> '. $tit_usuariogenera.'</td>
                   </tr>
                    <tr align="center">
                      <td width="25%" align="left"><strong> Fecha Emisión</strong></td>
                      <td width="25%" align="left"> '. $tit_fecharecaudacion.'</td>
                      <td width="25%" align="left"><strong> Usuario Emisión</strong></td>
                      <td width="25%" align="left"> '. $tit_usuarioemite.'</td>
                   </tr>
                   <tr align="center">
                      <td width="25%" align="left"><strong> Concepto</strong></td>
                      <td width="75%" align="left"> '. $tit_tipotramite.'</td>
                   </tr>
                   <tr align="center">
                      <td width="25%" align="left"><strong> Servivio Administrativo</strong></td>
                      <td width="75%" align="center">$ '. $tit_servicioadministrativo.'</td>
                   </tr>
                   <tr align="center">
                      <td width="25%" align="left"><strong> Impuesto Generado</strong></td>
                      <td width="75%" align="center">$ '. $tit_valimpuesto.'</td>
                   </tr>
                   <tr align="center">
                      <td><strong>TOTAL A PAGAR</strong></td>
                      <td><strong>$ '. $tit_valtotal.'</strong></td>
                   </tr>
                </table>
                <br><br>
                <table border="0" >
                   <tr align="center">
                      <td width="50%"><strong>_____________________</strong></td>
                      <td width="50%"><strong>_____________________</strong></td>
                   </tr>
                   <tr align="center">
                      <td width="50%"><strong>Jefe Rentas</strong></td>
                      <td width="50%"><strong>Recaudador</strong></td>
                   </tr>
                </table>

                <br><br><br><br>

                <table width="100%" border="1" >
                   <tr>
                    <td ROWSPAN="2" width="12%" align="center">
                      <br><br><img src="images/alpha.jpg" border="0" height="40" width="30" />
                    </td>
                    <td width="88%" colspan="0"><h4 align="center">GOBIERNO AUTÓNOMO DESCENTRALIZADO <br>MUNICIPAL DEL CANTÓN FLAVIO ALFARO</h4>
                    </td>
                   </tr>
                   <tr>
                      <td align="center"><h5><strong>Dirección: </strong>Calle Amazonas y Agustin Zambrano <strong>/ Teléfono:</strong>2353-691 / Correo: alcaldia@flavioalfaro.gob.ec</h5>
                        <h5><strong>RUC:</strong>1360000284001</h5></td>
                   </tr>
                </table>                       
                <br>
                <table border="0" >
                   <tr align="left">
                      <td width="100%" colspan="2"><strong>NRO.: '.$tit_nrotitulo.'</strong></td>
                   </tr>
                </table>

                <table border="1" >
                   <tr align="center">
                      <td colspan="3"><strong>CONTRIBUYENTE</strong></td>
                      <td><strong>CEDULA #</strong></td>
                   </tr>
                   <tr >
                      <td align="center" colspan="3">'. $tit_contribuyente.'</td>
                      <td align="center">'. $tit_cedularuc.'</td>
                   </tr>
                </table>
                <br>
                <table border="1" >
                   <tr align="center">
                      <td width="25%" align="left"><strong> Fecha Generado</strong></td>
                      <td width="25%" align="left"> '. $tit_fechaemision.'</td>
                      <td width="25%" align="left"><strong> Usuario Generado</strong></td>
                      <td width="25%" align="left"> '. $tit_usuariogenera.'</td>
                   </tr>
                    <tr align="center">
                      <td width="25%" align="left"><strong> Fecha Emisión</strong></td>
                      <td width="25%" align="left"> '. $tit_fecharecaudacion.'</td>
                      <td width="25%" align="left"><strong> Usuario Emisión</strong></td>
                      <td width="25%" align="left"> '. $tit_usuarioemite.'</td>
                   </tr>
                   <tr align="center">
                      <td width="25%" align="left"><strong> Concepto</strong></td>
                      <td width="75%" align="left"> '. $tit_tipotramite.'</td>
                   </tr>
                   <tr align="center">
                      <td width="25%" align="left"><strong> Servivio Administrativo</strong></td>
                      <td width="75%" align="center">$ '. $tit_servicioadministrativo.'</td>
                   </tr>
                   <tr align="center">
                      <td width="25%" align="left"><strong> Impuesto Generado</strong></td>
                      <td width="75%" align="center">$ '. $tit_valimpuesto.'</td>
                   </tr>
                   <tr align="center">
                      <td><strong>TOTAL A PAGAR</strong></td>
                      <td><strong>$ '. $tit_valtotal.'</strong></td>
                   </tr>
                </table>
                <br><br>
                <table border="0" >
                   <tr align="center">
                      <td width="50%"><strong>_____________________</strong></td>
                      <td width="50%"><strong>_____________________</strong></td>
                   </tr>
                   <tr align="center">
                      <td width="50%"><strong>Jefe Rentas</strong></td>
                      <td width="50%"><strong>Recaudador</strong></td>
                   </tr>
                </table>

                                <br><br><br><br>

                <table width="100%" border="1" >
                   <tr>
                    <td ROWSPAN="2" width="12%" align="center">
                      <br><br><img src="images/alpha.jpg" border="0" height="40" width="30" />
                    </td>
                    <td width="88%" colspan="0"><h4 align="center">GOBIERNO AUTÓNOMO DESCENTRALIZADO <br>MUNICIPAL DEL CANTÓN FLAVIO ALFARO</h4>
                    </td>
                   </tr>
                   <tr>
                      <td align="center"><h5><strong>Dirección: </strong>Calle Amazonas y Agustin Zambrano <strong>/ Teléfono:</strong>2353-691 / Correo: alcaldia@flavioalfaro.gob.ec</h5>
                        <h5><strong>RUC:</strong>1360000284001</h5></td>
                   </tr>
                </table>                       
                <br>
                <table border="0" >
                   <tr align="left">
                      <td width="100%" colspan="2"><strong>NRO.: '.$tit_nrotitulo.'</strong></td>
                   </tr>
                </table>

                <table border="1" >
                   <tr align="center">
                      <td colspan="3"><strong>CONTRIBUYENTE</strong></td>
                      <td><strong>CEDULA #</strong></td>
                   </tr>
                   <tr >
                      <td align="center" colspan="3">'. $tit_contribuyente.'</td>
                      <td align="center">'. $tit_cedularuc.'</td>
                   </tr>
                </table>
                <table border="1" >
                   <tr align="center">
                      <td width="25%" align="left"><strong> Fecha >Generado</strong></td>
                      <td width="25%" align="left"> '. $tit_fechaemision.'</td>
                      <td width="25%" align="left"><strong> Usuario Generado</strong></td>
                      <td width="25%" align="left"> '. $tit_usuariogenera.'</td>
                   </tr>
                    <tr align="center">
                      <td width="25%" align="left"><strong> Fecha Emisión</strong></td>
                      <td width="25%" align="left"> '. $tit_fecharecaudacion.'</td>
                      <td width="25%" align="left"><strong> Usuario Emisión</strong></td>
                      <td width="25%" align="left"> '. $tit_usuarioemite.'</td>
                   </tr>
                   <tr align="center">
                      <td width="25%" align="left"><strong> Concepto</strong></td>
                      <td width="75%" align="left"> '. $tit_tipotramite.'</td>
                   </tr>
                   <tr align="center">
                      <td width="25%" align="left"><strong> Servivio Administrativo</strong></td>
                      <td width="75%" align="center">$ '. $tit_servicioadministrativo.'</td>
                   </tr>
                   <tr align="center">
                      <td width="25%" align="left"><strong> Impuesto Generado</strong></td>
                      <td width="75%" align="center">$ '. $tit_valimpuesto.'</td>
                   </tr>
                   <tr align="center">
                      <td><strong>TOTAL A PAGAR</strong></td>
                      <td><strong>$ '. $tit_valtotal.'</strong></td>
                   </tr>
                </table>
                <br><br>
                <table border="0" >
                   <tr align="center">
                      <td width="50%"><strong>_____________________</strong></td>
                      <td width="50%"><strong>_____________________</strong></td>
                   </tr>
                   <tr align="center">
                      <td width="50%"><strong>Jefe Rentas</strong></td>
                      <td width="50%"><strong>Recaudador</strong></td>
                   </tr>
                </table>

      ';
     $pdf->writeHTML($html, true, false, true, false, '');
     $pdf->Output('certificado_avaluos.pdf', 'I');
