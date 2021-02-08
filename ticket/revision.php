<?php ob_start();

include "../config/db.php";
include "../config/conexion.php";

$id = $_GET['id'];

$query = "SELECT * FROM revision WHERE id_rv = '$id'";
$resultado = $con->query($query);
?> 

<?php include 'view_revision.php'; ?>

<body>
    <titulo>
        DIRECCION DE TRANSPORTE TERRESTRE, TRANSITO Y SEGURIDAD VIAL DEL CANTÓN FLAVIO ALFARO
    </titulo>

<?php
    foreach($resultado as $fila) {
?>
    <div>
        <tramite>
            TIPO DE TRÁMITE: <strong><?php echo $fila['tipo_tramite'];?></strong>
        </tramite>
    </div>
    <div>
        <turno>
            NÚMERO DE TURNO: <strong><?php echo $fila['numero_turno'];?></strong>
        </turno>
    </div>
    <div>
        <fecha>
            FECHA: <strong><?php echo $fila['fecha'];?></strong>
        </fecha>
    </div>
    <div>
        <datos>DATOS DEL VEHÍCULO</datos>
    </div>
    <div>
        <placa>
            PLACA O RANV: <strong><?php echo $fila['placa_ranv'];?></strong>
        </placa>
    </div>
    <div>
        <marca>
            MARCA: <strong><?php echo $fila['marca'];?></strong>
        </marca>
    </div>
    <div>
        <modelo>
            MODELO: <strong><?php echo $fila['modelo'];?></strong>
        </modelo>
    </div>
    <div>
        <fabricacion>
            AÑO FABRICACIÓN: <strong><?php echo $fila['fabricacion'];?></strong>
        </fabricacion>
    </div>
    <div>
        <tipo>
            TIPO: <strong><?php echo $fila['tipo'];?></strong>
        </tipo>
    </div>
    <div>
        <carroceria>
            CARROCERIA: <strong><?php echo $fila['carroceria'];?></strong>
        </carroceria>
    </div>
    <div>
        <tipovehiculo>
            TIPO DE VEHICULO: <strong><?php echo $fila['tipo'];?></strong>
        </tipovehiculo>
    </div>
    <div>
        <color1>
            COLOR 1: <strong><?php echo $fila['color1'];?></strong>
        </color1>
    </div>
    <div>
        <color2>
            COLOR 2: <strong><?php echo $fila['color2'];?></strong>
        </color2>
    </div>
    <div>
        <ley>
            En relación a lo dispuesto en el Reglamento General para las Aplicaciones de la ley Orgánica de Transporte Terrestre, Tránsito y Seguridad Vial, esta revisión vehicular comprenderá los siguientes aspectos.
        </ley>
    </div>
    
    <check>
        <a>
            <input>
            <label>
                <img src="check.png">Luces bajas, altas, retro, direccionales, stop, parqueo
            </label>
        </a>
        <b1>
            <input>
            <label>
                <img src="check.png">Triangulo de seguridad
            </label>
        </b1>
        <c>
            <input>
            <label>
                <img src="check.png">Limpiavidrios funcionando
            </label>
        </c>
        <d>
            <input>
            <label>
                <img src="check.png">Espejos retrovisores
            </label>
        </d>
        <e>
            <input>
            <label>
                <img src="check.png">Cinturon de seguridad
            </label>
        </e>
        <f>
            <input>
            <label>
                <img src="check.png">Parabrisas en buen estado
            </label>
        </f>
        <g>
            <input>
            <label>
                <img src="check.png">No posee protección metálica
            </label>
        </g>
        <h>
            <input>
            <label>
                <img src="check.png">Tipo de escape
            </label>
        </h>
        <i1>
            <input>
            <label>
                <img src="check.png">Pito funcionando
            </label>
        </i1>
        <j>
            <input>
            <label>
                <img src="check.png">LLanta con línea de rodaje continuas
            </label>
        </j>
        <k>
            <input>
            <label>
                <img src="check.png">Llanta de emergencia
            </label>
        </k>
        <l>
            <input>
            <label>
                <img src="check.png">Extintor, Botiquin
            </label>
        </l>
        <m>
            <input>
            <label>
                <img src="check.png">No posee películas
            </label>
        </m>
    </check>

    <motos>
            MOTOS: 
    </motos>

    <checkmotos>
        <n>
            <input>
                <label>
                    <img src="checkb.png">Luces bajas y altas
                </label>
        </n>
        <r>
            <input>
                <label>
                    <img src="checkb.png">Llantas
                </label>
        </r>
        <v>
            <input>
                <label>
                    <img src="checkb.png">Espejos retrovisores
                </label>
        </v>
        <w>
            <input>
                <label>
                    <img src="checkb.png">Dirección, stop
                </label>
        </w>
        <z>
        <input>
        <label>
            <img src="checkb.png">Pito funcional
        </label>
        </z>
    </checkmotos>

        <motor>
            N° Motor
        </motor>
        <mn>
            <?php echo $fila['n_motor'];?>
        </mn>
        <chasis>
            N° Chasis
        </chasis>
        <cn>
            <?php echo $fila['n_chasis'];?>
        </cn>
        <ob>
            Observaciones
        </ob>
        <observaciones>
        <?php echo $fila['observaciones']; ?>
        </observaciones>
        <im>
            IMPRONTA DE MOTOR  
        </im>
        <ic>
            IMPRONTA DE CHASIS
        </ic>

        <nr>
            
        </nr>
        <f1>
            NOMBRE DEL REVISOR
        </f1>
        <fr>
            ---------------------------------------------------
        </fr>
        <f2>
            FIRMA DEL REVISOR RESPONSABLE
        </f2>
        <f3>
            
            <f4>
                LA REVISIÓN VEHICULAR ES GRATUITA
            </f4>
            <br>
            <br>
            <f5>
                LAS IMPRONTAS SERÁN ELABORADAS EXCLUSIVAMENTE POR LOS REVISORES
            </f5>
        </f3>
        <f6>
            Este documento tendrá una vigencia de 30 días a partir de la fecha de emisión.
        </f6>
    
</body>
<?php
}
?>

<?php
require '../vendor/autoload.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->load_html(ob_get_clean());
$dompdf->setPaper('A4');
$dompdf->render();
$pdf = $dompdf->output();
$filename = 'Revision';
$dompdf->stream($filename, array("Attachment" => 0)); 
?>




