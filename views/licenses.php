<!Doctype Html>
<html>
    <head>
        <title>wiatr w żagle</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="Stylesheet" href="static/css/style.css">
        <link rel="Stylesheet" href="static/css/licenses.css">


    </head>
    <body>
        <?php include_once '../views/static/header.php'?>

        <main>
            <section>
            <div class="content">
                <h2>Uprawnienia obecne w żeglarstwie</h2>
                <p>
                    Dokumentem pozwalającym na kierowanie łodziami żaglowymi jest patent. Jego wydawaniem w Polsce zajmuje się Polski Związek Żeglarstwa.<br>
                    Wielkość dokumentu jest identyczna jak dokumentu tożsamości, prawa jazdy czy elektronicznej legitymacji studenckiej.<br>
                    Jest wykonana z plastiku, przez jest odporna za zamoczenie lub inne zniszczenia.
                </p>
                    W Polsce, można też pływać na łodziach bez ustawowych uprawnień. Jednak wiąże się to z pewnymi ograniczeniami:
                    <ul>
                        <li>jacht żaglowy do 7.5 m długości,</li>
                        <li>jacht motorowy do 10 kW (13.6 KM) mocy silnika,</li>
                        <li>jacht motorowy do 75 kW (101.97 KM) mocy silnika pod warunkiem, że prędkość maksymalna jednsotki to 15km/h (8.4kn).</li>
                    </ul>
                <p>
                    By uzyskać już określone patenty należy zdać odpowiedni egzamin teoretyczny, a następnie praktyczny. Wygląda to analogicznie do zdawania na prawo jazdy w Polsce. Bez zdanej teorii nie można podejść do części praktycznej<br>
                    Ponadto należy mieć odpowiedni wiek oraz posiadać wcześniejszy stopień uprawnień. Wymagana jest też określona ilość godzin wypływanych.
                </p>
                <table id="licenses">
                    <tr>
                        <th>Nazwa</th>
                        <th>Wiek</th>
                        <th>Ilość godzin</th>
                        <th>Uprawnienia</th>
                    </tr>
                    <tr>
                        <td>Żeglarz jachtowy</td>
                        <td>14 lat</td>
                        <td>Brak</td>
                        <td>
                            <ul>
                                <li>Brak ograniczeń na wodach śródlądowych</li>
                                <li>Na morzu - jachty do 12 m długości oraz 2 Mm od brzegu w ciągu dnia</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>Jachtowy sternik morski</td>
                        <td>18 lat</td>
                        <td>200</td>
                        <td>
                            <ul>
                                <li>Brak ograniczeń na wodach śródlądowych</li>
                                <li>Na morzu - jachty do 18 m długości bez ograniczenia odległości od brzegu i pory dnia</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>Kapitan jachtowy</td>
                        <td>18 lat</td>
                        <td>600</td>
                        <td>
                            <ul>
                                <li>Brak ograniczeń w kierowaniu jednostek</li>
                            </ul>
                        </td>
                    </tr>
                </table>
                <p>
                    Do kierowania łodziami motorowymi potrzeba innych uprawnień niż na żaglówki.
                    Jednak patent jachtowego sternika morskiego oraz kapitan jachtowy zyskują uprawnienia identyczne do analogicznych patentów motorowodnych.
                </p>
                <p>Więcej informacji: <a href="https://pya.org.pl/polski-zwiazek-zeglarski">https://pya.org.pl/polski-zwiazek-zeglarski</a></p>
            </div>
            <div class="aside_photos">
                <figure><img src="static/img/patent_wzor.jpg" alt="Wzor patentu">
                <figcaption>Wzór patentu żeglarskiego</figcaption></figure>
            </div>
        </section>
        </main>
        
        <?php include_once '../views/static/footer.php'?>
    </body>
</html>