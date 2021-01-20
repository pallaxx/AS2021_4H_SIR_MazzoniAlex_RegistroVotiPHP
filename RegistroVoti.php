<?php
print_r($_POST);

$cognomenome=$_POST["CognomeNome"];
$array = explode(" ",$cognomenome);
$materia=$_POST["slcMateria"];
$sommatoria=0; //somma tutti i voti
$sommatoriapesata=0; //somma i voti*pesi
$sommatoriapeso=0;
$media=0.0;
$mediapeso=0.0;
$i=0;
for($i=1; $i<=3;$i++)
{
    $data[]=$_POST[("Data".$i)];
    $voto[]=$_POST["Voto".$i];
    $peso[]=$_POST["Peso".$i];
}

for($i=0;$i<3;$i++)
{
    $sommatoria += $voto[$i];
    $sommatoriapeso += $peso[$i];
    $sommatoriapesata += $voto[$i]*$peso[$i];
}
$media=$sommatoria/3;
$mediapeso=$sommatoriapesata/$sommatoriapeso;

if($materia==1) 
    $materia="Informatica";
else if($materia==2) 
    $materia="Matematica";
else if($materia==3) 
    $materia="Italiano";
else if($materia==4) 
    $materia="Inglese";

echo("<br><br><h1>Registro voti</h1><br><br>");

echo("<table border='1'>");
    echo("<tr align='center'>");
        echo("<td><b>Nome</b></td>");
        echo("<td><b>Cognome</b></td>");
        echo("<td><b>Materia</b></td>");
        echo("<td><b>Data</b></td>");
        echo("<td><b>Voto</b></td>");
        echo("<td><b>Peso</b></td>");
    echo("</tr>");
    for($i=0;$i<3;$i++)
    {
    if($voto[$i] < 5.5)
        echo "<tr style='color:red';>";
    else if($voto[$i] < 8)
        echo ("<tr>");
    else if($voto[$i] > 7)
        echo ("<tr style='color:blue';>");

        echo("<td>".$array[0]."</td>");
        echo("<td>".$array[1]."</td>");
        echo("<td>".$materia."</td>");
        echo("<td>".$data[$i]."</td>");
        echo("<td>".$voto[$i]."</td>");
        echo("<td>".$peso[$i]."</td>");
    echo("</tr>");
    }
    echo("<tr>");
        echo("<td colspan='5'>Media Aritmetica</td>");
        echo("<td>".$media."</td>");
    echo("</tr>");
    
    echo("<tr>");
        echo("<td colspan='5'>Media Pesata</td>");
        echo("<td>".$mediapeso."</td>");
    echo("</tr>");
echo("</table>");
?>