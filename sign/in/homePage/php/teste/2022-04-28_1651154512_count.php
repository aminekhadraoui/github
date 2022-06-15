
    <td >
        <label  id='lbfiliere'>Filliere :</label></td>
<td class='td'>
    <select  name='f'  class='D' onblur='return verifFilliere()'>
        <option value='vide'>choisir votre filliere</option>
        <option value='P-SI' >P-SI</option><option value='D-TMW'>D-TMW</option>
        <option value='D-Fonda'>D-Fonda</option>
        <option value='T-TMW'>T-TMW</option>
        <option value='T-Fonda'>T-fonda</option>
        <option value='P-Master'>P-master</option>
        <option value='D-Master'>D-master</option>
        <option value='P-ingenieur'>P-ingenieur</option>
        <option value='D-ingenieur'>D-ingenieur</option>
    </select>
</td>
<td>
    <label  id='lbgroupe'>Groupe :</label></td>
<td id='groupe'>
    <select size='1' name='g' class='D' onblur='return verifGroupe()'>
        <option value='vide'>Choisir votre groupe</option>
        <option value='AV' id='get'>AV</option>
        <option value='SG'>SG</option>
<?php 
for($i=1;$i<=12;$i++)
{
    echo "<option value='TD$i'>TD$i</option>";
} 
?>    
    </select>
</td>
    