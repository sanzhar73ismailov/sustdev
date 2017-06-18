<?session_start();
if (($_SESSION['login'])) {
  include("blocks/bd.php");
  if(isset ($_GET['id'])) {$id=$_GET['id'];}
  if(!isset ($id)) {$id=1;}
  $result=mysql_query("select * FROM lessons WHERE id=1",$db);

  if(!$result) {
      echo "<p>Запрос в базу не прошел, напишите об этом админу (admin@mail.ru).<p><strong>Код ошибки:</strong></p>";
      exit(mysql_error());
  }
  if(mysql_num_rows($result)>0) {
      $myrow=mysql_fetch_array($result);
      $new_view=$myrow["view"]+1;
      $update_view=mysql_query("UPDATE lessons SET view='$new_view' WHERE id=$id", $db);
  }
  else {
      echo "<p> Информация не может быть извлечена, в таблице нет записей</p>";
      exit();
  }
  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $myrow["title"]; ?></title>
        <link href="style.css" rel="stylesheet" type="text/css" />
        <meta name="description" content="<?php echo $myrow["meta_d"]; ?>" />
        <meta name="keywords" content="<?php echo $myrow["meta_k"]; ?>" />




</head>

    <body>

     <table width="850" border="0" align="center" bgcolor="#FFFFFF" class="main_border">
      <?php include("blocks/header.php"); ?>
      <tr>
        <td valign="top"><table width="100%" border="0" align="center">
                        <tr>
                              <?php include("blocks/lefttd.php"); ?>
                            <td valign="top">
                                   <?php include("blocks/nav.php"); ?>
                                  <p>
                                  
                                   
                                  <!--start -->
<h3 align='center'>Дополнительную информацию можно найти в следующих публикациях:</h3><br>

                              <div class="content_publicatios_page">
<div class="content_title"><a name="content" id="table_of_contents">Содержание по темам</a></div> 
<ul class="content_list">
<li><a href="#obchie_ponyatiya">Устойчивое развитие: общие понятия теории устойчивого развития. Безопасность человека и экологическая безопасность. Устойчивое производство и потребление </a></li>
<li><a href="#effect_ispol">Эффективность использования природных ресурсов (вода, почвы, минералы, ископаемое топливо и т.д.) </a></li>
<li><a href="#sohranen_estest_ecosyst">Сохранение естественных экосистем и биоразнообразия </a></li>
<li><a href="#energia_klimat">Энергия и климат. Изменение климата </a></li>
<li><a href="#energosber_energoeff"> Энергосбережение и энергоэффективность. Альтернативные источники энергии</a></li>
<li><a href="#metod_rekomend">Методические рекомендации по установлению целевых показателей перехода к устойчивому развитию</a></li>
</ul>
</div>


<p class="text_less_title"><a name="obchie_ponyatiya">Устойчивое развитие: общие понятия теории устойчивого развития. Безопасность человека и экологическая безопасность. Устойчивое производство и потребление</a> [<a href="#table_of_contents">В содержание</a>]</p>

<br>&nbsp;</br><ol>
<li>Урсул А.Д. Переход России к устойчивому развитию. Ноосферная стратегия. – М.: Издательский дом «Ноосфера», 1998, 500 с.</li>
<li>Данилов-Данильян В.И., Лосев К.С. Экологический вызов и устойчивое развитие. Учебное пособие. – М.: Прогресс-Традиция, 2000, 416 с.</li>
<li>Данилов-Данильян В.И. Устойчивое развитие – будущее Российской Федерации // Россия на пути к устойчивому развитию. – М., 1996.</li>
<li>Indicators of Sustainable Development: Framework and Methodology. N.Y.: United Nations, 1996, 428 p. Цит. по Данилов-Данильян В.И., Лосев К.С. Экологический вызов и устойчивое развитие. Учебное пособие. – М.: Прогресс-Традиция, 2000, 416 с.</li>
<li>Лосев К.С. Экологический вызов и устойчивое развитие. Учебное пособие. – М.: Прогресс-Традиция, 2000, 416 с.</li>
<li>European Sustainable Cities. Report by the Expert Group on the Urban Environment. European Commission, Directorate General XI, Brussels, March 1996.</li>
<li>Островский Н.В. Критерии устойчивого развития: муниципальные аспекты / Экологические проблемы России. Предложения для обсуждения на 2-ом Всероссийском съезде по охране природы. М.: Центр экологической политики России, 1999 г.
<li>Концепция перехода Республики Казахстан к устойчивому развитию на 2007-2024 годы. / Указ Президента страны № 216 от 14 ноября 2006 года.</li>
<li>Пахаева Г.В. К вопросу об устойчивом развитии // Вестник молодых ученых. 2006. № 01.</li>
<li>Валянский С.И., Калюжный Д.В. Третий путь цивилизации, или спасет ли Россия мир? М., Алгоритм, 2002.</li>
<li>Моисеев Н.Н. Расставание с простотой. М., 1998., с. 62-65.</li>
<li>Наше общее будущее: Доклад Международной комиссии по окружающей среде и развитию (МКОСР). М., 1989., 70с.</li>
<li>Вяхирев Р.И. Экологические аспекты стратегии устойчивого развития ОАО «Газпром»//Приложение к журналу «Энергетическая политика». — М.: ГУ ИЭС, 1999.</li>
<li>Ракитов А.И. Наука и устойчивое развитие общества. // Общественные науки и современность. 1997. N 4. С. 5-11.</li>
<li>Human Development under Transition / Summaries of National Human Development Reports. N.-Y., 1994., с. 6-7.</li>
<li>Курс переходной экономики / Под ред. Л.И. Абалкина. М., 1997., с. 281-282.</li>
<li>Abernethy, V. D. (2002). "Population dynamics: Poverty, inequality, and self-regulating fertility rates." Pop Environ 24(1): 69-96. Ahituv, A. (2001). "Be fruitful or multiply: On the interplay between fertility and economic development." J. Popul Econ 14(1): 51-71.</li>
<li>Population, Environment and Development (The Concise Report). UN, New York, 2001.</li>
<li>World population to 2300. Dep. of econ. a. social affairs - New York : U. N., 2004 - XI, 240p.</li>
<li>Report of the United Nations Conference on Environment and Development, Rio de Janeiro, 3-14 June 1992).</li>
<li>Report of the International Conference on Population and Development, Cairo, 5-13 September 1994.</li>
<li>Haaga, J. G. (2005). "The end of world population growth in the 21st century: New challenges for human capital formation and sustainable development." Population and Development Review 31(1): 175-178.</li>
<li>UNDP Annual Report 2008, 40 p.</li>
<li>United Nations Development Programm. Human de velopment report 2007/2008. 30 p.</li>
<li>World Population Prospects 1990-2050 (the 1998 Revision). United Nations Popullation Devision, New York, 1998. World Population Prospects 1990-2050 (the 1999 Revision). United Nations Popullation Devision, New York, 2000.</li>
<li>World Population Prospects (the 2006 revision). United Nations Popullation Devision, New York, 2007.</li>
<li>An Urbanizing World (global report on human settlements). UNCHS, London, 2001.</li>
<li>Cities in Globalizing World (Global Report on Human Settlements). UNCHS, London, 2001.</li>
<li>Convention on Biological Diversity. UNEP/ CBD Secretariat, Geneva, 2001.</li>
<li>World Health Report 1995: Bridging the Gaps. WHO, Geneva, 1995.</li>
<li>Организация Объединенных Наций: основные факты — М.: Издательство «Весь Мир», 2005.</li>
<li>Our Planet, our Health (Report of the WHO Comission on Health and Environment), WHO, Geneva, 1992).</li>
<li>Documents of the 21st session of the Governing Council (Global Ministerial Environment Forum) of the United Nations.</li>
<li>Report of the World Commission on Environment and Development: Our Common Future, Oxford-New York, 1987.</li>
<li>Documents of the 17th session of the Governing Council of the United Nations Environment Programme. UNEP, Nairobi, 1993].</li>
<li>Декларация Рио-де-Жанейро. // Мир науки, 1992, N 4, сс. 6-7.</li>
<li>Большаков Б.Е., Кузнецов О.Л. Интеллект, финансы, энергетика и устойчивое развитие общества //«Академия Тринитаризма», М., Эл № 77-6567, публ.10871, 10.12.2003/</li>
<li>Индикаторы устойчивого развития России (эколого-экономичсские аспекты). - М., 2001.</li>
<li>Adams R., Perfomans indicators for sustainable development, Accounting and Business, April, 1999.</li>
<li>Meadows D.H., Meadows D.L., Randers J., Behrens W.W. The limiting to growth. N.Y.: Potomac, 1972.</li>
<li>Бобылев В. Информационная и методологическая основа для расчета эколого-экономических индикаторов, МГУ, 2000.</li>
<li>Некоторые соотношения между физическими величинами/Доклады АН СССР, 1965, № 4, т.163.</li>
<li>О.Л. Кузнецов, Б.Е. Большаков «Устойчивое развитие: научные основы проектирования в системе природа-общество-человек». СПб. - М. - Дубна, 2002.</li>
<li>Большаков Б.Е., Полынцев Д.А. Методология моделирования устойчивого разви¬тия страны. – 2006.</li>
<li>Большаков Б.Е., Искаков Н.А. Сарсенбай Н.К. Базовые понятия проектного управ¬ления устойчивым развитием. – 2007.</li>
<li>Большаков Б.Е. Законы сохранения и изменения биосферы-ноосферы. – 1990.</li>
<li>Богданов А.А. Тектология: Всеобщая организационная наука. – 2003.</li>
<li>Кузнецов О.Л., Большаков Б.Е. Мировоззрение и теория устойчивого развития. – 2005.</li>
<li>Додонов В.Ю. Организация функционирования системы механизмов устойчивого развития Казахстана / Под ред. проф.О.С.Сабдена. – Алматы, Институт экономики МОН РК, 2006. – 26с.</li>
<li>Искаков Н., Корчевский А. Устойчивое развитие Республики Казахстан: экономические, социальные, экологические аспекты. - Астана, 2007, 172 с.</li>
<li>Постановление Правительства Республики Казахстан от 1 июня 2007 года N 448 Об утверждении Правил определения целевых показателей качества окружающей среды.</li>
<li>Назарбаев Н.А. Казахстан-2030: процветание, безопасность и улучшение благосостояния всех казахстанцев. — 1997 г.</li>
<li>Назарбаев Н.А. Послание Президента Республики Казахстан Н.А. Назарбаева народу Казахстана «Новый Казахстан в новом мире». — 2007 г.</li>
<li>Послание Президента Республики Казахстан Н.А. Назарбаева народу Казахстана «Рост благосостояния граждан Казахстана — главная цель государственной политики» (Астана, 6 февраля 2008 года).</li>
<li>Опыт внедрения образования для устойчивого развития в Павлодарском государственном педагогическом институте/ Пособие. - Алматы, 2007, 72с.</li>
</ol>
<p class="text_less_title"><a name="effect_ispol">Эффективность использования природных ресурсов (вода, почвы, минералы и т.д.)
</a> [<a href="#table_of_contents">В содержание</a>]</p>
<ol>
<li>В.Данилов-Данильян, К.Лосев, И.Рейф. Перед главным вызовом цивилизации. Взгляд из России. – М.: Инфра, 2005.</li>
<li>Концепция перехода Республики Казахстан к устойчивому развитию на 2007-2024 годы. Утверждена Указом Президента Республики Казахстан от 14 ноября 2006 года № 216.</li>
<li>Бобылев С.Н., Ходжаев А.Ш. Экономика природопользования. – Москва, 2003. – 567 с.</li>
<li>Постановление Правительства Республики Казахстан от 5 января 2005 года N 30 «О Программе по рациональному использованию земель сельскохозяйственного назначения на 2005-2007 годы».</li>
<li>Инструкция по определению кадастровой (оценочной) стоимости земельных участков (приложение к приказу Председателя Агентства Республики Казахстан по управлению земельными ресурсами от 28 декабря 2004 года № 105-П) . Временные указания по корректировке материалов почвенных изысканий и бонитировки пашни в Республике Казахстан. Указания по инвентаризации земель сельскохозяйственного назначения. - Астана, 2003. </li>
<li>Государственная агропродовольственная программа Республики Казахстан на 2003-2005 годы. Утверждена Указом Президента Республики Казахстан от 5 июня 2002 года N 889.</li>
<li>Коваленко Н.Я. Экономика сельского хозяйства.- М.:ЭКМОС.-1999.</li>
<li>Гриненко С.В.. Экономика недвижимости. Таганрог, 2004. www.aup.ru/books/m94/</li>
<li>Государственная программа развития сельских территорий Республики Казахстан на 2004-2010 годы. Утверждена Указом Президента Республики Казахстан от 10 июля 2003 года N 1149.</li>
<li>Руководящие принципы управления земельными ресурсами. ЕСЕ/НВР/96. ООН, 1997 г.</li>
<li>Концепции развития водного сектора экономики и водохозяйственной политики РК до 2010 года.. Одобрена постановлением Правительства Республики Казахстан от 21 января 2002 г. N 71.</li>
<li>Постановление Кабинета Министров Республики Казахстан от 7 декабря 1994 года N 1381 «О концепции сырьевой политики Республики Казахстан».</li>
<li>Программа развития ресурсной базы минерально-сырьевого комплекса страны на 2003-2010 годы. Утверждена Постановлением Правительства РК от 29 декабря 2002 года № 1449.</li>
<li>www.gazeta.kz/art.asp?aid=121610</li>
<li>Справочник горной промышленности. www.miningexpo.ru/useful/2790</li>
<li>Тлеуберген М.А. Экономическая оценка комплексного использования минерально-сырьевых ресурсов. – Алматы: Казахский университет, 2002 г. – 235 с.</li>
<li>http://leo-mosk.narod.ru/works/08_06_19.htm</li>
<li>Постановление Правительства Республики Казахстан от 21 июля 1999 года N 1019 «Об утверждении Единых правил охраны недр при разработке месторождений твердых полезных ископаемых, нефти, газа, подземных вод в Республике Казахстан».</li>
<li>Казахстан. Лесной сектор в переходный период. Технический документ ВБ. 2003.</li>
<li>С.Б.Байзаков, А.А.Гурский, А.К.Аманбаев, Ж.Н.Токтасынов. Леса и лесное хозяйство Казахстана. Состояние, динамика, методы оценки. Алматы: Гылым, 1996 – 160 с.</li>
<li>Досжанов Т.Н. Животный мир Казахстана и проблемы его экологии. Институт зоологии, МОН РК. www.kazsu.kz/default.aspx?htmlid=429.</li>
<li>Лошадкин К.А. Международный опыт создания информационных систем в сфере управления природопользованием Сб. статей./НПП "Кадастр", Ярославль. - 1997. - 200 с.</li>
<li>Бобылев С.Н., Ходжаев А.Ш. Экономика природопользования. – Москва, 2003. – 567 с.</li>
<li>Закон РК Об охране животного мира. Алматы, 2004.</li>
<li>Концепция развития туризма в Республике Казахстан. Одобрена Постановлением Правительства Республики Казахстан от 6 марта 2001 года N 333.</li>
<li>Руководящие принципы устойчивого развития туризма в уязвимых экосистемах. Документ ЮНЕП/CBD/SBSTTA/8/11. - 2002.</li>
<li>Макконелл К.Р., Брю С.Л. Экономика. – М., 1995.</li>
<li>«Экология». Учебное пособие, под ред. С.А.Боголюбова - М., «Знание», 1997.</li>
<li>Мюррей Р. Цель — Zero Waste. (Перев. с англ.). — М.: ОМННО «Совет Гринпис», 2004. — 232 с.</li>
<li>Барт Карл-Гейнц Мусор, рыночная экономика и «страшное привидение». www.strana-oz.ru/?numid=35&article=1435</li>
<li>Об очистке городских стоков в Директиве ЕС 1992 года, М.- 1993.</li>
<li>Справочник по управлению в области охраны окружающей среды. Под ред. А. Штайнера, ПРООН, 2003.</li>
<li>Директива ЕС 96/61/EC о комплексных мерах по предотвращению и контролю за загрязнением, глава 2/4.5.</li>
<li>Концепции реформирования законодательства в области охраны окружающей среды. Одобрена протокольным решением заседания Премьер-министра РК 26.05.2005 г.</li>
<li>Друзь Н., Борисова Н., Корчевский А., ред. Искаков Н.А. Возобновляемые источники энергии и энергосбережение. - Астана, 2008.</li>
<li>Программа развития электроэнергетики до 2030 года. Утверждена Постановлением Правительства Республики Казахстан от 09.04.1999 года N 384.</li>
<li>Варнавский В. Государственно-частное партнерство в России: проблемы становления. www.strana-oz.ru/?article=988&numid=21</li>
<li>Кузнецов О.Л., Большаков Б.Е. «Устойчивое развитие: научные основы проектирования в системе «природа—общество—человек». — Спб.—М.—Дубна, 2002.</li>
<li>Большаков Б.Е., Полынцев Д.А. «Моделирование устойчивого социально-экономического развития в системе «общество-природа» с использованием измеримых величин». — Новосибирск, 2004.</li>
<li>Разработка эффективных пакетов инструментов реализации экологической политики в странах ВЕКЦА: Накопленный опыт и направления реформы. Документ СРГ ПДООС KIEV.CONF/2003/INF/11.</li>
<li>Данилов-Данильян В.И., Лосев К.С. Экологический вызов и устойчивое развитие. Учебное пособие. – М.: Прогресс-Традиция, 2000, 416 с.</li>
<li>European Sustainable Cities. Report by the Expert Group on the Urban Environment. European Commission, Directorate General XI, Brussels, March 1996.</li>
<li>Островский Н.В. Критерии устойчивого развития: муниципальные аспекты / Экологические проблемы России. Предложения для обсуждения на 2-ом Всероссийском съезде по охране природы. М.: Центр экологической политики России, 1999 г.</li>
<li>Вяхирев Р.И. Экологические аспекты стратегии устойчивого развития ОАО «Газпром»//Приложение к журналу «Энергетическая политика». — М.: ГУ ИЭС, 1999.</li>
<li>Human Development under Transition / Summaries of National Human Development Reports. N.-Y., 1994., с. 6-7.</li>
<li>Курс переходной экономики / Под ред. Л.И. Абалкина. М., 1997., с. 281-282.</li>
<li>Abernethy, V. D. (2002). "Population dynamics: Poverty, inequality, and self-regulating fertility rates." Pop Environ 24(1): 69-96. Ahituv, A. (2001). "Be fruitful or multiply: On the interplay between fertility and economic development." J. Popul Econ 14(1): 51-71.</li>
<li>World population to 2030. Dep. of econ. a. social affairs - New York : U. N., 2004 - XI, 240p.</li>
<li>Haaga, J. G. (2005). "The end of world population growth in the 21st century: New challenges for human capital formation and sustainable development." Population and Development Review 31(1): 175-178.</li>
<li>World Population Prospects 1990-2050 (the 1998 Revision). United Nations Popullation Devision, New York, 1998. World Population Prospects 1990-2050 (the 1999 Revision). United Nations Popullation Devision, New York, 2000.</li>
<li>
</ol>

<p class="text_less_title"><a name="sohranen_estest_ecosyst">
Сохранение естественных экосистем и биоразнообразия 
</a> [<a href="#table_of_contents">В содержание</a>]</p>

<ol>
<li>Примак Р. Основы сохранения биоразнообразия, М., 2007.</li>
<li>Миркин Б.М, Наумова Л.Г. Курс лекций по устойчивому развитию. – М.: Тайдекс Ко, 2005. – 248 с.</li>
<li>Armstrong S., Botzler R. (eds.). Environmental Ethics: Divergence and Convergence. N.Y.: McGraw-Hill, 1998.</li>
<li>Bulte E. van Kooten G.C. Economic science, endangered species, and biodiversity loss // Conservation Biology. 2000. V. 14. P. 113–119.</li>
<li>Costanza R., R. d’Arge, R. de Groot, S. Farber, et al. The value of the world’s ecosystem services and natural capital // Nature. 1997. V. 387. P. 253–260.</li>
<li>Daily G. C. (ed.). Nature’s Services: Societal Dependence on Ecosystem Services. Washington, D.C.: Island Press, 1997.</li>
<li>Heywood, V. H. Global Biodiversity Assessment. Cambridge: Cambridge University Press, 1995.</li>
<li>Meffe, G.C., Carroll C. R. and contributors. Principles of Conservation Biology, Second Edition. Sunderland, MA: Sinauer Associates, 1997.</li>
<li>Morell V. The variety of life // National Geographic. 1999. V. 195 (February). P. 6–32.</li>
<li>Primack R. Essentials of Conservation Biology. Second Edition. Sunderland, MA.: Sinauer Associates, 1998.</li>
<li>Tilman, D. The ecological consequences of change in biodiversity: A search for general principles // Ecology. 1999. V. 80. P. 1455–1474.</li>
<li>Wilson, E. O. The Diversity of Life. Cambridge, MA.: Belknap Press of Harvard University Press, 1992.</li>
<li>World Conservation Monitoring Centre (WCMC). Global Biodiversity: Status of the Earth’s Living Resources. Compiled by the World Conservation Monitoring Centre. L.: Chapman and Hall, 1992.</li>
<li>
</ol>

<p class="text_less_title"><a name="energia_klimat">
Энергия и климат. Изменение климата
</a> [<a href="#table_of_contents">В содержание</a>]</p>

<ol>
<li>Lorenz E.N. Climatic Change as a Mathematical Problem // J.Appl.Meteor. – 1970. – V.9. – P. 325 – 329.</li>
<li>JonesP.D., WigleyT.M.L., WrightP.B. Global temperature variations between 1861 and 1984 //</li>
<li>Nature. – 1986. - V.322. - P. 430-434.</li>
<li>Джоунс Ф.Д., Уигли Т.М.Л. Тенденции глобального потепления //В мире науки (Scientific American).- 1990.- № 10. - C. 62-70.</li>
<li>Hansen J., Lebedeff S. Global trends of measured surface air temperature //J. Geophys. Res.- 1987. - V. 92. - P. 13345-13372.</li>
<li>Jones P. D., Osborn T.J., Briffa K.R. Estimating sampling errors in large-scale temperature averages // Journal of Climate. -1997. -V.10 (10) - P. 2548-2568.</li>
<li>Nicholls N., Gruza G.V., Jouzel J., Karl T.R., Ogallo L.A., Parker D.E. Observed climate variability and change, in Climate Change 1995: The Science of Climate Change. - Edited by J. T. Houghton, L. G. M. Filho, B. A. Callander, N. Harris, A. Kattenberg, K. Maskell, Cambridge University Press, Cambridge, UK, 1996. – P. 133-192.</li>
<li>Ledley T.S., Sundquist E.T., Schwartz S.E., Hall D.K., Fellows J.D., Killeen T.L. Climate Change and Greenhouse Gases // Eos, AGU Transection. – 1999. – V.80. – N. 39. – P. 453-458.</li>
<li>Jones P.D., Parker D.E., Osborn N.J., Briffa K.R. Global and hemispheric temperature anomalies – land and marin instrumental records // Trends: A Compendium of Data on Global Change. – 1998. - CDIAC, ORNL, Oak Ridge.</li>
<li>Mann M.E., Bradley R.S., Hughes M.K. Northern hemisphere temperatures during the past millennium: . Inferences, uncertainties, and limitations // Geophysical Research Letters. – 1999. - V.26. – P. 759-762.</li>
<li>Mann M. E., Bradley R.S., Hughes M.K. Global-scale temperature patterns and climate forcing over the past six centuries // Nature. – 1998. – V.392 (6678). – P. 779-787.</li>
<li>Jones P. D., Briffa K.R. Global surface air temperature variations during the 20th century: Part 1 – Spatial, temporal and seasonal details // Holocene. – 1992. - V. 1. – P. 165-179.</li>
<li>IPCC, Climate Change 2001: The contribution of Working Group 1 to the Third AssessmentReport of the Intergovernmental Panel on Climate Change. Edited by J.T.Houghton et al., Cambridge University Press, Cambridge, UK, 2001. – 881 P.</li>
<li>Levi, B.G., The Decreasing Artic Ice Cover // Physics Today. – 2000. - N 1. – P. 19-20.</li>
<li>http://www.nsidc.org.</li>
<li>Миланкович М. Математическая климатология и астрономическая теория климата. – М.-Л.: Гос. научно-техн. изд-во, 1939. – 207 с.</li>
<li>Wegener A. Die Entstehung der Kontinente und Ozeane. –Braunschweig, 4 Ed., 1929. - 135 s.</li>
<li>Кондратьев К.Я. Глобальный климат. – С.-Петербург: Наука, 1992. – 358 с.</li>
<li>Кароль И.Л. Оценки характеристик относительного вклада парниковых газов в глобальное потепление климата // Метеорология и гидрология. 1996. - №11. – С. 5-12.</li>
<li>Вернадский В.И. Живое вещество. – М.,Л.: Госиздат, 1938. – 399 с.</li>
<li>Перельман А.И. Геохимия. – М.: Высшая школа, 1989. – 527 с.</li>
<li>Будыко М.И., Ронов А.Б., Яншин А.Л. История атмосферы.–Ленинград: Гидрометеоиздат, 1985.– 208с.</li>
<li>IPCC, Climate Change 1995: The Science of Climate Change. Contribution of Working Group I to the Second Assessment Report of the Intergovernmental Panel on Climate Change. Edited by J.T. Houghton et al., Cambridge Univ. Press, Cambridge, UK, 1996. – 572 p.</li>
<li>Tett S.F.B., Mitchell J.F.B., Parker D.E., Allen M.R. Human influence on the atmospheric vertical temperature structure: detection and observations // Science. – 1996. – V.274. – P. 1170-1173.</li>
<li>Penner, J.E., Chuang C.C., Grant K. Climate forcing by carbonaceous and sulfate aerosols // Clim. Dyn. – 1998. – V.14. – P. 839-851.</li>
<li>Hansen J.E., Sato M., Lacis A., Ruedy R., Tegen I., Matthews E. Climate forcings in the industrial era // Proc. Natl. Acad. Sci. U.S.A. – 1998. – V. 95. – P. 12753-12758.</li>
<li>NOAA Climate Monitoring and Diagnostics Laboratory, Carbon Cycle Group (1999a). Continuous in - situ CO2 data files (ftp://ftp.cmdl.noaa.gov/ccg/co2/in-situ).</li>
<li>NOAA Climate Monitoring and Diagnostics Laboratory, Carbon Cycle Group (1999b). Atmospheric methane mixing ratios (ftp://ftp.cmdl.noaa.gov/ccg/ch4/flask).</li>
<li>NOAA Climate Monitoring and Diagnostics Laboratory, Halocarbons Other Atmospheric Trace Species Group (1999c) Group data (ftp://ftp.cmdl.noaa.gov/noah/n2o).</li>
<li>Houghton, J. T., Filho L.G.M., Bruce J., Lee H., Callander B.A., Haites E., Harris N., Maskell K. Radiative forcing of climate change. In Climate Change 1994, Cambridge University Press, Cambridge, 1995.– 231p.</li>
<li>Etheridge D. M., Steele L.P., Francey R.J., Langenfelds R.L. Atmospheric methane between 1000 A.D. and present: Evidence of anthropogenic emissions and climatic variability // J. Geophys. Res.-Atmos. – 1998. – V.103. – P. 15979-15993.</li>
<li>Etheridge D., L., Steele R., Langenfelds R., Francey R., Barnola J., Morgan V. Natural and anthropogenic changes in atmospheric CO2 over the last 1000 years from air in Antarctic ice and firn // J. Geophys. Res. – 1996.- V. 101. – P. 4115-4128.</li>
<li>Machida T., Nakazawa T., Fujii Y., Aoke S., Watanabe O. Increase in atmospheric nitrous oxide concentrations during the last 250 years // Geophysical Research Letters. – 1995. – V. 22. – P. 2921-2924.</li>
<li>Tерез Э.И., Терез Г.А. О зависимости долговременного тренда глобального озона от изменения солнечной постоянной // Геомагнетизм и аэрономия. – 1994. - T.34. - №5. - C. 151-156.</li>
<li>Terez E.I., Terez G.A. The connection between solar activity and long-term trends of total ozone in the Northern Hemisphere // J. of Atmosph. And Terr. Phys.- 1996. – V. 58. - 1849-1854.</li>
<li>Karoly D. Detection and attribution of a stratospheric role in climate change: an IPCC Perspective // SPARC. – 2001. - N 16. – P. 16-18.</li>
<li>Jaworowski Z. Radiation risk and ethic // Physics today. – 1999. - N 9. – P. 24-29.</li>
<li>Turco R.P., Toon O.B., Ackerman T.P., Pollack J.B., Sagan C. Nuclear Winter: Global consequences of multiple nuclear explosions // Science. – 1983. – V. 222. – N. 4630. - 1283-1292.</li>
<li>Кондратьев К.Я., Байбаков С.Н., Никольский Г.А. Ядерная война, атмосфера и климат // Наука в СССР. – 1985. - № 2, C.3-13, № 3.- C.3-11, 97-101.</li>
<li>Toon O.B., Zahnle K., Turco R.P., Covey C., Enviromental perturbations caused by asteroid impacts. – In: Hazards due to comets and asteroids: Ed. T.Geherels, Tucson: The University of the Arizona Press, 1994. – C. 791-826.</li>
<li>CASPY,1995 // International conference CASPY-95: Economics, Ecology Mineral resources.Moscow, - 1995.</li>
<li>Проблемы морфотектоники, геодинамики и геоэкологии Каспия на международных симпозиумах 1995 // Известия РАН. Cерия географическая. - 1996. - № 6. - C. 140-146.</li>
<li>42 Голицын Г.С., Радкович Д.Я., Фортус М.И., Фролов А.В. О современном подъеме уровня Каспийского моря // Водные ресурсы. –1998. – Т. 25. - № 2. – С. 133-139.</li>
<li>Zhang I. et al. Further statistics on the distribution of permafrost and ground ice in the Northern Hemisphere // Polar Geography. – 2000. – V.24. – P.126-131.</li>
<li>Достовалов В.Н., Кудрявцев В.А. Общее мерзлотоведение. – М.: Изд. МГУ, 1967. – 403 с.</li>
<li>Burgess M. et al. Global Terrestrial Network For Permafrost (GTNet-P): permafrost monitoring contributing to global climate observations. – Ottawa: Geological Survey of Canada, 2000. Current Research 2000 E –14. - 8 p.</li>
<li>Romanovsky V., Burgess M., Smith S., Yoshikawa K., Brown J. Permafrost Temperature Records: Indicators of Climate Change // Eos, Transactions AGU. – 2002. – V.83. – N 50. – P.589, 593, 594.</li>
<li>http://books.nap.edu/catalog/6365.html.</li>
<li>Christy J.R. Temperature above the surface layer // Clim.Change. – 1995. – V. 31. – P. 455-474.</li>
<li>Angell J.K. Variations and trends in tropospheric and stratosperic global temperatures, 1958-87 // J. Clim. – 1998. - V. 1. – P. 1296-1313.</li>
<li>Christy J.R., Spenser R.W., Lobl E.S. Analysis of the merging procedure for the MSU daily temperature time series // J.Clim. – 1998. - V. 11. – P. 2016-2041.</li>
<li>Bengtsson L., Roeckner E., Stendel M. Why is the global warming proceeding much slower than expected? // J.G.R. – 1999. – V. 104. - N D4. – P. 3865-3876.</li>
<li>Lindzen R.S. Some coolness concerning global warming // Bull. Am. Meteorol. Soc. – 1990. – V.71. – P. 288-299.</li>
<li>Spencer R.W., Braswell W.D. How dry is the tropical free troposphere, Implications for global warming theory // Bull. Am. Meteorol. Soc. - 1997 – V. 78. – P. 1097-1106.</li>
<li>Eddy J. The Maunder Minimum // Science. – 1976. -, V.192. – P.1189-1202.</li>
<li>Friis-Christensen E., Lassen K. Length of the solar cycle: An indicator of solar activity closely associeted with climate // Science. – 1991. – V. 254. – P. 698-700.</li>
<li>Lassen K., Friis-Christensen. Variability of the solar cycle length during the past five centuries and the apparent association with terrestrial climate // J. Atmos. Terr. Physics. 1995. – V. 57. – N 8. – P.835-845.</li>
<li>Svensmark H., Friis-Christensen E. Variation of cosmic ray flux and global cloud coverage: A missing link in solar-climate relationships // J.Atmos.Sol.Terr.Phys. – 1997. – V. 59. – P. 1225-1232.</li>
<li>Wetherald R.T., Stouffer R.J., Dixon K.W. Commited warming and its implications for climate change // Geophys. Res. Let. - 2001. - V. 28. -, P.1535-1538.</li>
<li>WMO Scientific Assessment of Stratospheric Ozone. Report N 20.- 1989. - V.1. – P. 228.</li>
<li>Terez E.I., Terez G.A. Investigation of atmospheric transmission in the Crimea (Ukraine) in the twentieth century // J. Appl. Meteorology. – 2002. – V. 41. – N 10. – P. 1060-1063.</li>
<li>Damon P.E., Peristykh A.N. Solar cycle length and 20th century northern hemisphere warming: revisited // Geoph. Res. Letters. – 1999. –V.26. – P.2469-2472.</li>
<li>Gleissberg W. A table of secular variations of the solar cycle // Terr. Magn. Atmos. Electr. – 1944. – V.49. – P. 243-244.</li>
<li>Damon P.E., Jirikowic J.L. The Sun as a low-frequency harmonic oscillator // Radiocarbon. – 1992. – V.34. – P. 199-205.</li>
<li>Damon P.E., Sonett C.P. Solar and terresrial componens of the atmospheric 14 C variation spectrum // The Sun in Time. – 1991. – Ed. C.P.Sonett, V.S.Giampapa, M.S.Matthews. Univ. of Arisona Press, Tucson. – P. 360-388.</li>
<li>Иванов В.В. Периодические колебания погоды и климата // УФН - 2002. – Т.172. - №7. – С.777 – 811.</li>
<li>66 Dickinson R.E., Kiehl J., Gent P. Widely awaited Community Climate System Model to be released soon. Eos, AGU Transactions. – 2002. – V. 83. - N 11. –P. 119.</li>
<li>http://www.unfccc.de.</li>
<li>Showstack R. New U.S. Global Change Research Institute Opens // Eos, AGU Transactions. – 2001. –V. 82. - N 12. - P. 142.</li>
<li>Barron E.J. Will Bush Energize U.S.Climate and Global Change Research? // Eos, AGU Transactions. - 2002. – V.83. - N 1. – P. 4, 8.</li>
<li>Showstack R. U.S. Climate Science Conference Examines Strategic Plan // Eos, AGU Transactions. – 2002. – V.83. – N 52. – P. 614.</li>
<li>Peteet D. Global Younger Dryas? // Quatern. Int. – 1995. - 28. – P. 93-104.</li>
<li>Будыко М.И., Израэль Ю.А., Яншин А.Л. Глобальное потепление и его последствия // Метеорология и гидрология. – 1991. - № 12. – С. 5-10.</li>
<li>Jirikowic J.L., Damon P.E. The Medieval Solar Activity Maximum // Climatic Change. – 1994. –V.26. – P. 309-316.</li>
</ol>

<p class="text_less_title"><a name="energosber_energoeff">
Энергосбережение и энергоэффективность. Альтернативные источники энергии
</a> [<a href="#table_of_contents">В содержание</a>]</p>

<ol>
<li>Сударев А.В. Гелиоводонагреватель жидкости. Патент РК, № 9360. - 2000.</li>
<li>Сударев А.В. Солнечный коллектор. Патент РК, № 7812. - 1999.</li>
<li>Сударев А.В. Солнечный коллектор. Патент РК, № 9359. - 2000.</li>
<li>Сударев А.В. Солнечная водонагревательная установка гостиницы «Алматы». - Алматы: «Энергетика», 2005. - № 1. </li>
<li>Сударев А.В. Солнечный нагреватель жидкости. Патент РК, № 10127. - 2001.</li>
<li>Сударев А.В. Солнечный нагреватель жидкости. Патент РК, № 10128. - 2001. </li>
<li>Сударев А.В. Призменный гелиоводонагреватель. – Алматы: Энергетика, 2002. - № 3. </li>
<li>http://www.rea.org.ua/ НПО «Агентство по возобновляемой энергетике» - создано для содействия развитию возобновляемых источников энергии на Украине.</li>
<li>Брдлик П.М. Испытание и расчет солнечных опреснительных установок. // Использование солнечной энергии. - М., 1957. - Сб. 1; Байрамов Р. Сравнительные испытания солнечных опреснителей парникового типа. – Ашхабад: Изв. АН Туркм. ССР. / Сер. физико-технических, химических и геологических наук. - 1964. - №1; Современные методы опреснения воды. - 1967.</li>
<li>Апельцин И.Э., Клячко В.А. Опреснение воды. - М., 1968; Павлов Ю.В. Опреснение воды. - М., 1972: </li>
<li>www.intersolar.ru Российский центр солнечной энергии «Интерсоларцентр» (Москва) создан в 1994 г. для координации работ в области ВИЭ в России, а также для взаимодействия России с международными организациями в этой области. На сайте опубликованы материалы бюллетеня по возобновляемой энергии (1998 год). С октября 2000 в рамках ОПЭТ издается новый ежеквартальный бюллетень «Возобновляемая энергия».</li>
<li>http://www.fid-tech.com/rus/technol/data/energetics/1.2xx.html</li>
<li>Международный форум «Высокие технологии XXI века». Альтернативные виды топлива и источников энергии, энергосберегающие технологии. Проблемы и перспективы возобновляемой энергии в России.</li>
<li>http://www.hitechno.ru/?page=analytics041</li>
<li>В. Gille. Le moulin a eau: une revolution technique medievale. // Techniques et civilisations. - 1954. - Vol. 3. - Р. 1-15; </li>
<li>Norman Smith. Man and water: a history of hydro-technology. Peter Davies, Ltd. - 1976.</li>
<li>Jean Gimpel. The medieval machine: the industrial revolution of the middle ages. Holt, Rinehart and Winston, 1976.</li>
<li>Биогаз: и греет, и варит. / Ж. «Моделист-конструктор», 1987. - №1. - С. 10-11.</li>
<li>Тодорова Н. «Энергия... из мусорной кучи?» / Газета «Казахстанская правда». - №192, от 16 августа 2001 г.</li>
<li>Тонкобаева Л. В этом доме – биогаз. / Молодежный эколого-правовой журнал «Я и Земля». - 2001, - № 7(17), ноябрь, С. 4-5.</li>
<li>Biogas plants in Europe. An updated databank. A. Pauss, E. - J. Nuns. Final report, commission of the European Communities. – 1990. - 67 p.</li>
<li>Маттиас Шен. Компогаз - метод брожения биоотходов. / Ж. «Метроном». – 1994. - №1-2. - С. 41.</li>
<li>http://www.biomass.kiev.ua/ На страницах этого сайта опубликованы материалы первой в Украине международной конференции «Энергия из биомассы», с успехом проведенной в 2005 году в Киеве.</li>
<li>http://www.rea.org.ua/ НПО «Агентство по возобновляемой энергетике». Агентство по возобновляемой энергетике создано для содействия развитию возобновляемых источников энергии на Украине.</li>
<li>Рей Д., Макмайкл Д. Тепловые насосы. - М.: Энергоиздат, 1982. - С. 224.</li>
<li>Дукенбаев К. Энергетика Казахстана. Технический аспект. - Алматы, 2001. - С. 312.</li>
<li>Г. Хайнрих, Х. Найорк, В. Нестлер. Тепловые насосы для отопления и горячего водоснабжения. - М.: Стройиздат, 1985. - С. 340.</li>
<li>Янтовский Е. И. Парокомпрессионные теплонасосные установки. - М., Энергоиздат, 1982. - С. 144.</li>
<li>Плешка М. С. Теплонасосные гелиосистемы отопления и горячего водоснабжения зданий. – Кишинев: Штиинца, 1990. - С. 121.</li>
<li>Енин П.М. Практическое использование возобновляемых и нетрадиционных источников энергии в теплоснабжении. – Киев: ИПК, 1988. - С. 96.</li>
<li>Энергосбережение в системах теплоснабжения, вентиляции и кондиционирования воздуха: Справочное пособие. - М.: Стройиздат, 1990. - 624 с.</li>
<li>Зубков В.А. Использование тепловых насосов в системах теплоснабжения. / Теплоэнергетика. – 1996. - № 2. - С. 17-19.</li>
<li>Королева Т.И. Экономическое обоснование оптимизации теплового режима здания. - М.: АСВ, 2001. - 144 с.</li>
<li>Табунщиков Ю.А., Бродач М.М. Научные основы проектирования энергоэффективных зданий. – AВОК, 1998. - № 1. - С. 5-10.</li>
<li>Андриевский А.А, Волдодин В.И. Энергосбережение и энергетический менеджмент. - Мн.: Вышэйшая школа, 2005. - 294 с.</li>
<li>Учебная программа по энергоаудиту в зданиях. Алматы и Бишкек, 2002/03. ENSI, 2002. - 640 с.</li>
<li>Информация на сайте http://www.unece.org/speca/energy/tranrer.pdf Г.С. Асланян, С.Д. Молодцов, Е.В. Надеждин. Энергетика и энергетическая политика стран Центральной Азии. Состояние на рубеже ХХ столетия. Основополагающие нормативно-правовые документы, регулирующие энергосбережение и строительную деятельность на территории РФ. / Журнал «Новости теплоснабжения». – 2004. - № 5. </li>
<li>Постановление правительства РК от 04.02.2000 года № 167 «Об утверждении правил экспертизы энергосбережения действующих и строящихся объектах».</li>
<li>Табунщиков Ю. А. Энергоэффективные здания. М.: АВОК-ПРЕСС, 2003. - 200 с.</li>
<li>Энергосбережение в системах теплоснабжения, вентиляции и кондиционирования воздуха. Справочное пособие. / Под ред. Л.Д. Богуславского. - М.: Стройиздат, 1990. - 624 с.</li>
<li>Королева Т.И. Экономическое обоснование оптимизации теплового режима здания. - М.: АСВ, 2001. - 144 с.</li>
<li>Энергоэффективные здания. / Ред. Сарнацкий Э.В. Селиванов Н.П. - М.: Стройиздат, 1988. - 376 с.</li>
</ol>
<p class="text_less_title"><a name="metod_rekomend">
Методические рекомендации по установлению целевых показателей перехода к устойчивому развитию
</a> [<a href="#table_of_contents">В содержание</a>]</p>

<ol>
<li>Урсул А.Д. Переход России к устойчивому развитию. Ноосферная стратегия. – М.: Издательский дом «Ноосфера», 1998, 500 с.</li>
<li>Перелет Р.А. Переход к эре устойчивого развития. – 2003.</li>
<li>Пахаева Г.В. К вопросу об устойчивом развитии. / Вестник молодых ученых. – 2006. - № 01.</li>
<li>Большаков Б.Е., Кузнецов О.Л. Интеллект, финансы, энергетика и устойчивое развитие общества - М.: Академия Тринитаризма. - Эл № 77-6567, публ. 10871, 10.12.2003.</li>
<li>Кузнецов О.Л., Большаков Б.Е. Устойчивое развитие: научные основы проектирования в системе природа-общество-человек. - СПб. - М. - Дубна, 2002. - С. 163.</li>
<li>Концепция перехода Республики Казахстан к устойчивому развитию на 2007-2024 годы. / Указ Президента страны № 216 от 14 ноября 2006 года.</li>
<li>Послание Президента Республики Казахстан Нурсултана Назарбаева народу Казахстана «Стратегия вхождения Казахстана в число пятидесяти наиболее конкурентоспособных стран мира (от 1 марта 2006 г.).</li>
<li>Послание Президента Республики Казахстан Нурсултана Назарбаева народу Казахстана «Новый Казахстан в новом мире» (от 14 февраля 2007 г.).</li>
<li>Послание Президента Республики Казахстан Н.А. Назарбаева народу Казахстана «Рост благосостояния граждан Казахстана — главная цель государственной политики» (Астана, 6 февраля 2008 года). </li>
<li>Организация Объединенных Наций: основные факты - М.: Весь Мир, 2005</li>
<li>Our Planet, our Health (Report of the WHO Comission on Health and Environment), WHO, Geneva, 1992). Convention on Biological Diversity. UNEP/ CBD Secretariat. - Geneva, 2001.</li>
<li>Экологический кодекс Республики Казахстан от 9 января 2007 года N 212, Ведомости Парламента Республики Казахстан, 2007 г., N 1, ст. 1; "Казахстанская правда" от 23 января 2007 года N 12 (25257).</li>
<li>Постановление Правительства Республики Казахстан «Об утверждении целевых показателей перехода к устойчивому развитию» (27 сентября 2007 года № 848).</li>
</ol>

                            
                            
                            
                            
                            
                            
                              <!--end-->
                            
                            <p>&nbsp;                            </p>
                            <? include 'blocks/test_start.php'; ?>                            </td>
          </tr>
        </table></td>
       </tr>
            <tr>
                  <?php include("blocks/footer.php"); ?>
            </tr>
    </table>
</body>
</html>
<?
}else{
      include 'procedures/if_not_auth.php';
       }

       ?>