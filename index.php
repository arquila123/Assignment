        <?php
        session_start();
        require('header.php');
        $dbc = mysql_connect('localhost', 'root', '');
        @mysql_query('CREATE DATABASE MainDatabase');
        @mysql_select_db('MainDatabase');
        ?>
        
<table align="center" >
            <tr>
                <td><img src="Diary.jpg" style="width: 200px;height: 300px"></td>
                <td class="book"><b><u>Diary of Wimpy Kid</u></b><br/><br/>It's a new school year, and Greg Heffley finds himself thrust into<br/> middle school, where undersized weaklings share the <br/>hallways with kids who are taller, meaner, and already....<br/><br/><br/><br/>
                    <button class="buy" value="129.90" onclick="location.href='comment.php'">Comment</button></td>
            </tr>
            <tr>
                <td><img src="catchingfire.jpg" style="width: 200px;height: 300px"></td>
                <td class="book"><b><u>Catching Fire</u></b><br/><br/>Suzanne Collins continues the amazing story of Katniss Everdeen in<br/> the phenomenal Hunger Games trilogy.

                    Against all odds, Katniss<br/> Everdeen has won the annual Hunger Games with fellow district tribute <br/>Peeta Mellark. But it was a victory won by...<br/><br/><br/><br/>
                    <button class="buy" value="149.90" onclick="location.href='comment.php'">Comment</button></td>
            </tr>
            <tr>
                <td><img src="city.jpg" style="width: 200px;height: 300px"></td>
                <td class="book"><b><u>City of Bones</u></b><br/><br/>Clary (Lily Collins) is a typical teenaged girl in New York, who lives<br/> with her mom — an artist. No boyfriend, but Simon (Robert Sheehan)<br/> is her best friend who will follow her anywhere. And she just happens<br/> to live above a tarot card fortune teller. But one day...<br/><br/><br/><br/>
                    <button class="buy" value="99.90" onclick="location.href='comment.php'">Comment</button></td>
            </tr>
            <tr>
                <td><img src="davinci.jpg" style="width: 200px;height: 300px"></td>
                <td class="book"><b><u>The Davinci Code</u></b><br/><br/>An ingenious code hidden in the works of Leonardo da Vinci. A<br/> desperate race through the cathedrals and castles of Europe. An <br/>astonishing truth concealed for centuries . . . unveiled at last. <br/>While in Paris, Harvard symbologist Robert Langdon is...<br/><br/><br/><br/>
                    <button class="buy" value="129.90" onclick="location.href='comment.php'">Comment</button> </td>
            </tr>
        </table>
        
    </body>
</html>
