<?php
// Configuración de la conexión PDO
$host = 'localhost';
$dbname = 'dwes_manana_empresa';
$username = 'root';
$password = '';

try {
    // Conexión a la base de datos con PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Iniciar la transacción
    $pdo->beginTransaction();

    // Insertar Sedes
    $sedes = [
        [1, 'SEDECENTRAL', 'C\\ATOCHA,405,MADRID'],
        [2, 'SEDESUR', 'PLAZANUEVA,3,SEVILLA'],
        [3, 'SEDENORESTE', 'PASEODEGRACIA,15,BARCELONA']
    ];

    $sqlSedes = "INSERT INTO sedes (id_sede, nombre, direccion) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sqlSedes);
    foreach ($sedes as $sede) {
        $stmt->execute($sede);
    }

    // Insertar Departamentos
    $departamentos = [
        [1, 'Financiero', 7350000, 1],
        [2, 'RecursosHumanos', 1200000, 1],
        [3, 'Marketing', 625000, 2],
        [4, 'Comercial', 450000, 3],
        [5, 'Compras', 2350000, 2],
        [6, 'LogísticayOperaciones', 890000, 3],
        [7, 'ControldeGestión', 350000, 1],
        [8, 'Calidad', 140000, 2]
    ];
    $sqlDepartamentos = "INSERT INTO departamentos (id_departamento, nombre, presupuesto, id_sede) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sqlDepartamentos);
    foreach ($departamentos as $departamento) {
        $stmt->execute($departamento);
    }

    // Insertar Paises
    $paises = [
        [1, 'Afgana', 'Afganistán'],
        [2, 'Albanesa', 'Albania'],
        [3, 'Alemana', 'Alemania'],
        [4, 'Andorrana', 'Andorra'],
        [5, 'Angoleña', 'Angola'],
        [6, 'Argelina', 'Argelia'],
        [7, 'Argentina', 'Argentina'],
        [8, 'Australiana', 'Australia'],
        [9, 'Austriaca', 'Austria'],
        [10, 'Bahamesa', 'Bahamas'],
        [11, 'Bahreina', 'Bahrein'],
        [12, 'Bangladesha', 'Bangladesh'],
        [13, 'Barbadesa', 'Barbados'],
        [14, 'Belga', 'Bélgica'],
        [15, 'Beliceña', 'Belice'],
        [16, 'Bermudesa', 'Bermudas'],
        [17, 'Birmana', 'Birmania'],
        [18, 'Boliviana', 'Bolivia'],
        [19, 'Botswanesa', 'Botswana'],
        [20, 'Brasileña', 'Brasil'],
        [21, 'Bulgara', 'Bulgaria'],
        [22, 'Burundesa', 'Burundi'],
        [23, 'Butana', 'Butan'],
        [24, 'Camboyana', 'RepdeCamboya'],
        [25, 'Camerunesa', 'Camerún'],
        [26, 'Canadiense', 'Canada'],
        [27, 'Centroafricana', 'RepCentroafricana'],
        [28, 'Chadeña', 'Chad'],
        [29, 'Checoslovaca', 'RepublicaCheca'],
        [30, 'Chilena', 'Chile'],
        [31, 'China', 'China'],
        [32, 'China', 'Taiwan'],
        [33, 'Chipriota', 'Chipre'],
        [34, 'Colombiana', 'Colombia'],
        [35, 'Congoleña', 'Congo'],
        [36, 'Costarricense', 'CostaRica'],
        [37, 'Cubana', 'Cuba'],
        [38, 'Danes', 'Dinamarca'],
        [39, 'Dominicana', 'RepublicaDominicana'],
        [40, 'Ecuatoriana', 'Ecuador'],
        [41, 'Egipcia', 'Egipto'],
        [42, 'Emirata', 'EmiratosArabes'],
        [43, 'Escosesa', 'Escocia'],
        [44, 'Eslovaca', 'Rep.Eslovaca'],
        [45, 'Española', 'España'],
        [46, 'Estona', 'Estonia'],
        [47, 'Etiope', 'Etiopia'],
        [48, 'Fijena', 'Fiji'],
        [49, 'Filipina', 'Filipinas'],
        [50, 'Finlandesa', 'Finlandia'],
        [51, 'Francesa', 'Francia'],
        [52, 'Gabiana', 'Gambia'],
        [53, 'Gabona', 'Gabón'],
        [54, 'Galesa', 'Gales'],
        [55, 'Ghanesa', 'Ghana'],
        [56, 'Granadeña', 'Granada'],
        [57, 'Griega', 'Grecia'],
        [58, 'Guatemalteca', 'Guatemala'],
        [59, 'GuinesaEcuatoriana', 'GuineaEcuatorial'],
        [60, 'Guinesa', 'Guinea'],
        [61, 'Guyanesa', 'Guyana'],
        [62, 'Haitiana', 'Haiti'],
        [63, 'Holandesa', 'Holanda'],
        [64, 'Hondureña', 'Honduras'],
        [65, 'Hungara', 'Hungria'],
        [66, 'India', 'India'],
        [67, 'Indonesa', 'Indonesia'],
        [68, 'Inglesa', 'Inglaterra'],
        [69, 'Iraki', 'Irak'],
        [70, 'Irani', 'Iran'],
        [71, 'Irlandesa', 'Irlanda'],
        [72, 'Islandesa', 'Islandia'],
        [73, 'Israeli', 'Israel'],
        [74, 'Italiana', 'Italia'],
        [75, 'Jamaiquina', 'Jamaica'],
        [76, 'Japonesa', 'Japón'],
        [77, 'Jordana', 'Jordania'],
        [78, 'Katensa', 'Katar'],
        [79, 'Keniana', 'Kenia'],
        [80, 'Kuwaiti', 'Kwait'],
        [81, 'Laosiana', 'Laos'],
        [82, 'Leonesa', 'Sierraleona'],
        [83, 'Lesothensa', 'Lesotho'],
        [84, 'Letonesa', 'Letonia'],
        [85, 'Libanesa', 'Libano'],
        [86, 'Liberiana', 'Liberia'],
        [87, 'Libeña', 'Libia'],
        [88, 'Liechtenstein', 'Liechtenstein'],
        [89, 'Lituana', 'Lituania'],
        [90, 'Luxemburgo', 'Luxemburgo'],
        [91, 'Madagascar', 'Madagascar'],
        [92, 'Malawi', 'Malawi'],
        [93, 'Maldivas', 'Maldivas'],
        [94, 'Mali', 'Mali'],
        [95, 'Maltesa', 'Malta'],
        [96, 'Marfilesa', 'CostadeMarfil'],
        [97, 'Marroqui', 'Marruecos'],
        [98, 'Mauricio', 'Mauricio'],
        [99, 'Mauritana', 'Mauritania'],
        [100, 'Mexicana', 'México'],
        [101, 'Monaco', 'Monaco'],
        [102, 'Mongolesa', 'Mongolia'],
        [103, 'Nauru', 'Nauru'],
        [104, 'Neozelandesa', 'NuevaZelandia'],
        [105, 'Nepalesa', 'Nepal'],
        [106, 'Nicaraguense', 'Nicaragua'],
        [107, 'Nigerana', 'Niger'],
        [108, 'Nigeriana', 'Nigeria'],
        [109, 'Norcoreana', 'CoreadelNorte'],
        [110, 'Norirlandesa', 'Irlandadelnorte'],
        [111, 'Norteamericana', 'EstadosUnidos'],
        [112, 'Noruega', 'Noruega'],
        [113, 'Omana', 'Omán'],
        [114, 'Pakistani', 'Pakistán'],
        [115, 'Panameña', 'Panamá'],
        [116, 'Paraguaya', 'Paraguay'],
        [117, 'Peruana', 'Perú'],
        [118, 'Polaca', 'Polonia'],
        [119, 'Portoriqueña', 'PuertoRico'],
        [120, 'Portuguesa', 'Portugal'],
        [121, 'Rhodesiana', 'Rhodesia'],
        [122, 'Ruanda', 'Ruanda'],
        [123, 'Rumana', 'Rumanía'],
        [124, 'Rusa', 'Rusia'],
        [125, 'Salvadoreña', 'ElSalvador'],
        [126, 'SamoaOccidental', 'SamoaOccidental'],
        [127, 'Sanmarino', 'SanMarino'],
        [128, 'Saudi', 'ArabiaSaudita'],
        [129, 'Senegalesa', 'Senegal'],
        [130, 'Singapur', 'Singapur'],
        [131, 'Siria', 'Siria'],
        [132, 'Somalia', 'Somalia'],
        [133, 'Sovietica', 'UnionSovietica'],
        [134, 'SriLanka', 'SriLanka(Ceylan)'],
        [135, 'Suazilandesa', 'Suazilandia'],
        [136, 'Sudafricana', 'Sudafrica'],
        [137, 'Sudanesa', 'Sudan'],
        [138, 'Sueca', 'Suecia'],
        [139, 'Suiza', 'Suiza'],
        [140, 'Surcoreana', 'CoreadelSur'],
        [141, 'Tailandesa', 'Tailandia'],
        [142, 'Tanzana', 'Tanzania'],
        [143, 'Tonga', 'Tonga'],
        [144, 'Tongo', 'Tongo'],
        [145, 'TrinidadyTobago', 'TrinidadyTobago'],
        [146, 'Tunecina', 'Tunez'],
        [147, 'Turca', 'Turquia'],
        [148, 'Ugandesa', 'Uganda'],
        [149, 'Uruguaya', 'Uruguay'],
        [150, 'Vaticano', 'Vaticano'],
        [151, 'Venezolana', 'Venezuela'],
        [152, 'Vietnamita', 'Vietnam'],
        [153, 'Yugoslava', 'Yugoslavia'],
        [154, 'Zaire', 'Zaire']
    ];
    $sqlPaises = "INSERT INTO paises (id_pais, nacionalidad, pais) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sqlPaises);
    foreach ($paises as $pais) {
        $stmt->execute($pais);
    }

    // Insertar Empleados
    $empleados = [
        [1, 'MiguelÁngel', 'maperezes@email.com', 'PérezEstrada', 25000, 4, 1, 45],
        [2, 'Pilar', 'pperezdi@email.com', 'PérezDíaz', 26000, 1, 1, 45],
        [3, 'Silvia', 'sestevezpe@email.com', 'EstévezPérez', 27000, 0, 1, 45],
        [4, 'Teresa', 'tserranoso@email.com', 'SerranoSosa', 28000, 2, 1, 45],
        [5, 'MaríaÁngeles', 'madiazfe@email.com', 'DiezFernández', 29000, 1, 2, 45],
        [6, 'Pablo', 'ptorreses@email.com', 'TorresEspinar', 30000, 1, 2, 45],
        [7, 'Manuel', 'msolerame@email.com', 'SoleraMena', 31000, 3, 2, 45],
        [8, 'Joaquín', 'jantonvi@email.com', 'AntónVillanueva', 32000, 2, 2, 45],
        [9, 'Alberto', 'acarpinterolo@email.com', 'CarpinteroLópez', 18500, 2, 3, 45],
        [10, 'Juan', 'jsantiagopi@email.com', 'SantiagoPintos', 19250, 2, 3, 45],
        [11, 'JuanJosé', 'jjfernandezmo@email.com', 'FernándezMoreno', 20000, 3, 3, 45],
        [12, 'Pilar', 'pgodoyse@email.com', 'GodoySerra', 20750, 4, 3, 45],
        [13, 'Francisca', 'fgarciava@email.com', 'GarcíaValladares', 21500, 3, 3, 45],
        [14, 'MaríaMagdalena', 'mmcastroma@email.com', 'CastroMarín', 22250, 2, 4, 45],
        [15, 'Manuel', 'mfernandezfe@email.com', 'FernándezFernández', 23000, 0, 4, 45],
        [16, 'Luis', 'lbarceloga@email.com', 'BarcelóGarcía', 23750, 3, 4, 45],
        [17, 'Jesús', 'jlopezma@email.com', 'LópezMatías', 24500, 4, 4, 45],
        [18, 'Laura', 'lnavarrofe@email.com', 'NavarroFernández', 28500, 1, 4, 45],
        [19, 'Sara', 'sportillogo@email.com', 'PortilloGonzález', 29500, 1, 4, 45],
        [20, 'JuanManuel', 'jmgallegoor@email.com', 'GallegoOrtiz', 30500, 3, 4, 45],
        [21, 'MaríaÁngeles', 'masanchezto@email.com', 'SánchezTorrejón', 31500, 4, 4, 45],
        [22, 'Daniel', 'dhidalgopo@email.com', 'HidalgoPorras', 32500, 0, 4, 45],
        [23, 'MaríaPilar', 'mpruizro@email.com', 'RuizRodríguez', 33500, 4, 4, 45],
        [24, 'Antonio', 'apuigot@email.com', 'PuigOtero', 34500, 4, 4, 45],
        [25, 'Manuel', 'msotogo@email.com', 'SotoGonzález', 35500, 1, 4, 45],
        [26, 'Rosario', 'rperezlo@email.com', 'PérezLópez', 36500, 2, 4, 45],
        [27, 'Irene', 'igarciala@email.com', 'GarcíaLastra', 37500, 2, 4, 45],
        [28, 'Alicia', 'amarquezma@email.com', 'MárquezMaldonado', 38500, 2, 4, 45],
        [29, 'Eduardo', 'egomezal@email.com', 'GómezAlba', 39500, 3, 4, 45],
        [30, 'Eduardo', 'epascualga@email.com', 'PascualGarcía', 40500, 3, 4, 106],
        [31, 'Jorge', 'javilabi@email.com', 'ÁvilaBilbao', 41500, 2, 5, 7],
        [32, 'JoséAntonio', 'jaantolinga@email.com', 'AntolínGarcía', 19000, 0, 5, 45],
        [33, 'Jorge', 'jmartinsa@email.com', 'MartinSáez', 20000, 3, 5, 119],
        [34, 'Carmen', 'cmaganre@email.com', 'MagánRey', 21000, 3, 5, 45],
        [35, 'Vicente', 'vrodriguezan@email.com', 'RodríguezAndrés', 22000, 1, 5, 45],
        [36, 'Mercedes', 'mzapataro@email.com', 'ZapataRoca', 23000, 1, 5, 45],
        [37, 'Enrique', 'edelgadopi@email.com', 'DelgadoPimentel', 24000, 3, 5, 45],
        [38, 'Juan', 'jpereafe@email.com', 'PereaFernández', 25000, 2, 5, 45],
        [39, 'José', 'jmorenogu@email.com', 'MorenoGuerrero', 26000, 2, 5, 45],
        [40, 'Marc', 'mfuentesve@email.com', 'FuentesVerdú', 27000, 0, 5, 45],
        [41, 'Mireia', 'mramosul@email.com', 'RamosUlloa', 28000, 0, 5, 45],
        [42, 'Sergio', 'sperezes@email.com', 'PérezEstévez', 29000, 0, 5, 45],
        [43, 'Óscar', 'oreydi@email.com', 'ReyDíaz', 30000, 2, 5, 45],
        [44, 'Rafael', 'rgaleanoca@email.com', 'GaleanoCamarena', 31000, 3, 5, 45],
        [45, 'Fuensanta', 'fgarridogo@email.com', 'GarridoGonzález', 25700, 1, 5, 45],
        [46, 'María', 'mgarciaga@email.com', 'GarcíaGarcía', 26500, 1, 5, 45],
        [47, 'Manuel', 'mfrancoto@email.com', 'FrancoTorres', 27300, 2, 6, 45],
        [48, 'José', 'jcorralesme@email.com', 'CorralesMesa', 28100, 4, 6, 45],
        [49, 'Carmen', 'cmartinsza@email.com', 'MartinsZabala', 28900, 4, 6, 18],
        [50, 'Javier', 'jsosani@email.com', 'SosaNieto', 29700, 4, 6, 45],
        [51, 'Beatriz', 'bmolinaji@email.com', 'MolinaJiménez', 30500, 0, 6, 45],
        [52, 'Alberto', 'agarciasa@email.com', 'GarcíaSáez', 31300, 2, 6, 45],
        [53, 'Antonio', 'agonzalezma@email.com', 'GonzálezMartínez', 32100, 1, 6, 45],
        [54, 'MaríaPilar', 'mpcascalesar@email.com', 'CascalesArcos', 32900, 4, 6, 45],
        [55, 'MaríaLuisa', 'mlgonzalezsi@email.com', 'GonzálezSilvestre', 33700, 2, 6, 45],
        [56, 'María', 'mlozanoor@email.com', 'LozanoOrtiz', 34500, 3, 6, 45],
        [57, 'MaríaDolores', 'mdpradara@email.com', 'PradaRamírez', 35300, 2, 6, 45],
        [58, 'Pedro', 'psampedrobo@email.com', 'SampedroBohórquez', 36100, 0, 6, 45],
        [59, 'Manuel', 'msilvara@email.com', 'SilvaRamiro', 36900, 0, 6, 45],
        [60, 'JuanCarlos', 'jcestebandu@email.com', 'EstebanDuran', 37700, 4, 6, 45],
        [61, 'MaríaVictoria', 'mmllobetbl@email.com', 'LlobetBlanes', 38500, 1, 7, 45],
        [62, 'Alba', 'aasenciopo@email.com', 'AsencioPorto', 39300, 1, 7, 45],
        [63, 'JoséJuan', 'jjsanchosa@email.com', 'SanchoSánchez', 40100, 4, 7, 45],
        [64, 'Javier', 'jpalacioste@email.com', 'PalaciosTenorio', 40900, 1, 7, 45],
        [65, 'Cristina', 'clopezve@email.com', 'LópezVela', 41700, 3, 7, 45],
        [66, 'Antonio', 'aaguilarce@email.com', 'AguilarCeballos', 26500, 1, 7, 45],
        [67, 'Carlos', 'cchaparrode@email.com', 'ChaparroDelaFuente', 27000, 0, 7, 100],
        [68, 'MaríaÁngeles', 'mabanosbu@email.com', 'BañosBueno', 27500, 4, 7, 73],
        [69, 'MaríaÁngeles', 'maromerome@email.com', 'RomeroMéndez', 28000, 4, 7, 100],
        [70, 'Margarita', 'mmatace@email.com', 'MataCea', 28500, 4, 7, 115],
        [71, 'Ángeles', 'amendezfe@email.com', 'MéndezFernández', 29000, 2, 7, 45],
        [72, 'AnaMaría', 'amvaldiviagu@email.com', 'ValdiviaGutiérrez', 29500, 3, 1, 45],
        [73, 'Alejandro', 'afernandezdo@email.com', 'FernándezDomínguez', 30000, 2, 1, 45],
        [74, 'David', 'dmedinalo@email.com', 'MedinaLópez', 30500, 0, 2, 45],
        [75, 'Inmaculada', 'ilopezro@email.com', 'LópezRodríguez', 31000, 0, 2, 45],
        [76, 'Alex', 'adelri@email.com', 'DelRioLlamazares', 31500, 1, 3, 45],
        [77, 'Andrés', 'adasi@email.com', 'DaSilvaAngulo', 32000, 2, 3, 45],
        [78, 'David', 'dcaleroco@email.com', 'CaleroCollado', 32500, 3, 4, 45],
        [79, 'MaríaTeresa', 'mtmorenope@email.com', 'MorenoPérez', 33000, 1, 4, 44],
        [80, 'Juan', 'jvelascoca@email.com', 'VelascoCarballo', 33500, 0, 4, 7],
        [81, 'José', 'jromerapa@email.com', 'RomeraParada', 34000, 0, 4, 49],
        [82, 'Manuela', 'mdelgadomu@email.com', 'DelgadoMuñoz', 34500, 2, 5, 39],
        [83, 'Santiago', 'smartinezde@email.com', 'MartínezDelgado', 35000, 2, 5, 45],
        [84, 'Raúl', 'rfreiresa@@email.com', 'FreireSaavedra', 35500, 3, 5, 45],
        [85, 'AnaBelén', 'abvillanuevaso@email.com', 'VillanuevaSoler', 36000, 3, 6, 45],
        [86, 'Silvia', 'smoralesru@email.com', 'MoralesRubio', 36500, 4, 6, 45],
        [87, 'Pedro', 'pmartingo@email.com', 'MartinGonzález', 37000, 3, 6, 45],
        [88, 'Rafael', 'rojedamo@email.com', 'OjedaMolina', 18000, 1, 7, 45],
        [89, 'Enrique', 'ebuenoju@email.com', 'BuenoJuan', 18500, 2, 7, 45],
        [90, 'Eduardo', 'elopezva@email.com', 'LópezVázquez', 19000, 4, 7, 45],
        [91, 'Carmen', 'cmiroar@email.com', 'MiroAres', 19500, 1, 7, 45],
        [92, 'Sergio', 'ssomozaga@email.com', 'SomozaGarcía', 20000, 1, 8, 45],
        [93, 'Antonia', 'apenaga@email.com', 'PeñaGallego', 20500, 4, 8, 45],
        [94, 'Isabel', 'ilopezra@email.com', 'LópezRamos', 21000, 1, 8, 45],
        [95, 'FranciscoJavier', 'fjrodriguezbe@email.com', 'RodríguezBeltrán', 21500, 4, 8, 45],
        [96, 'Juan', 'jalemanyri@email.com', 'AlemanyRivero', 22000, 3, 8, 45],
        [97, 'Felipe', 'ftiradohe@email.com', 'TiradoHernández', 22500, 3, 1, 45],
        [98, 'Antonio', 'agarciaro@email.com', 'GarcíaRomero', 23000, 1, 2, 45],
        [99, 'Cristina', 'clopezle@email.com', 'LópezLechuga', 23500, 0, 3, 149],
        [100, 'MaríaConcepción', 'mcestevebe@email.com', 'EsteveBecerra', 24000, 2, 4, 100]
    ];
    $sqlEmpleados = "INSERT INTO empleados (id_empleado, nombre, email, apellidos, salario, hijos, id_departamento, id_pais) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sqlEmpleados);
    foreach ($empleados as $empleado) {
        $stmt->execute($empleado);
    }

    // Confirmar la transacción
    $pdo->commit();

    echo "Los datos se han insertado correctamente.";
} catch (PDOException $e) {
    // Si hay un error, revertir la transacción
    $pdo->rollBack();
    echo "Error: " . $e->getMessage();
}
