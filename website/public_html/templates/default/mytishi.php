<link rel="stylesheet" href="<?=SITE_URL?>templates/default/assets/src/css/modal.css">
<?php
require_once "include/head.php";
?>

<body>

<div class="wrapper">

    <?php
    require_once "include/header.php";
    ?>




    <div class="page-wrap">


        <?php
        require_once "include/asider.php";
        ?>


        <div class="main-content">
            <div class="card-head">
                <span class="title-head">Квартал Мытищи</span>
                <span class="main-head">О проекте</span>
                <span class="main-head">Генплан</span>
                <span class="main-head">Ипотека</span>
                <span class="main-head">Расположения</span>
                <span class="main-head">Планировки</span>
            </div>
            <div class="container-fluid" style="position: relative">
                <div class="img-rublyovka" style="min-height: 629.438px; display: flex; flex-direction: column; position: relative">
                    <div class="building-selection_wrap" style="position: absolute">
                        <button class="back-btn" type="button" id="back-btn2" onclick="back_tomain()"><</button>
                        <button class="back-btn" type="button" id="back-btn1" hidden="true" onclick="back()"><</button>
                        <img src="<?=SITE_URL?>templates/default/assets/imgs/main-plan-mytishi.jpg" alt=""  class="mytishi-img">

                        <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="2.0" x="0px" viewBox="0 0 1920 1080" class="building-selection">

                    <g class="visual_poly" ><polygon id="first-house-mytishi" class="build-selection0" points="779.6,374 776.8,341 692.2,322.5 641.1,365.7 643.7,393.6 634.1,402 634.1,395.2 613.1,390.4
		514,475.3 526.1,554.4 671,591.9 831.3,421.1 826.6,350.9 807.1,347.8 724.8,426.6 726.6,446.2 716.4,457.2 698.5,451.8
		652.9,495.7 642.6,492.2 628.9,504.5 629.3,512.9 601.1,506.3 706.9,407.1 738.3,413.7 	"></g>

                            <g class="visual_poly" ><polygon id="second-house-mytishi" class="build-selection0" points="908.1,655.5 805.2,629.1 754.4,689.7 724.6,729.1 741.2,733.3 740,708.8 754.4,689.7 834.6,712.1
				836.4,761.3 864.5,770.5 863.9,728.8 902.2,677.5 902.1,662.2 910.4,653.6 918.9,642.7 920.2,637.9 949,598.7 951.4,598.7
				953.2,596 953.2,592.4 965.8,576.2 989.5,583 989.5,663.8 893.1,804.9 680.2,742 678.7,713.2 677,700.2 675,688.9 672.9,671.1
				672.9,660.8 715.9,612.6 727.8,615.3 752.7,586.8 752.2,573.1 789.7,532.5 925.8,566.6 926.1,629.7 920.2,637.9 918.9,642.7
				910.4,653.6 908.5,655.6"></g>

                            <g class="visual_poly" ><polygon id="third-house-mytishi" class="build-selection0" points="909.6,397.36 1032.99,424.43 1032.18,482.57 1069.71,431.51 1090.65,436.67 1087.91,509.79
				1012.05,622.22 988.21,615.94 990.14,552.48 1020.26,512.21 1020.1,507.22 922.17,484.67 889.71,524.13 960.34,542.17
				960.5,582.76 950.35,595.49 950.35,598.06 945.04,604.99 925.87,600 925.07,567.78 876.74,555.7 876.74,547.49 871.64,553.76
				819.56,541.2 818.27,496.43 852.1,459.22 862.41,461.96 881.09,440.85 880.61,428.94"></g>

                            <g class="visual_poly">
                                <polygon id="fourth-house-mytishi" class="build-selection0" points="996.9,416.3 996.9,410 1005.5,399.1 1019.1,402.4 1019.1,378 1027.4,368.7 1083.8,379.7
        1083.8,365.5 1091.9,353.4 1099.8,354.3 1167.4,262.7 1186.3,266.6 1186.3,279.5 1192.9,280.1 1192.1,324.7 1110.1,444.3
        1090.9,439.8 1090.9,437.1 1070.3,432.2 1067.4,436 1034.3,428.6 1034.3,425.4"></polygon>
                                <polygon id="fourth-house-mytishi" class="build-selection0" points="1087.8,302.8 1087.1,343.7 1079.2,354.9 1043.7,349 1028.5,369 1027.4,368.7 1019.1,378
        1019.1,379.2 990.1,416.3 968.1,411.5 968.6,371.8 966.6,371.6 966.6,365.9 968.7,365.9 969,349.6 966.6,349.3 966.6,343
        969,342.9 969.1,340 1014.8,287.9 1034,292.2"></polygon>
                            </g>
                            <g class="visual_poly"><polygon id="sixth-house-mytishi" class="build-selection0" points="1174.8,264.1 1167.2,262.6 1156.8,275.2 1105.3,267 1075.3,300.3 1063.9,298.3
		1044.8,294.3 1044.8,270.7 1062.3,250.9 1063.9,250.8 1063.9,231.9 1098.3,192.6 1177,205.9 1174.8,264.1 1175.9,251.2
		1205.4,209.7 1224.3,213.2 1222,254.2 1222,258.2 1220,260.2 1220,277.5 1191.3,320.2 1192.9,280.2 1185.9,279.7 1185.7,266.5"></polygon></g>




                            <a href="home/floor">
                                <g><polygon hidden="true" class="hover st1" id="kv1" points="594,563.1 438.9,563.1 438.9,533.8 338.9,533.8 335.3,624.2 338.9,761.1 343.9,761.1 343.9,782.9 348.3,782.9 348,846 594,846 594,619.1 	"></polygon></g>
                                <g><polygon hidden="true" class="hover st1" id="kv2" points="732.5,846 733,619.1 730.9,563.1 594,563.1 594,619.1 594,846"></polygon></g>
                                <g><polygon hidden="true" class="hover st1" id="kv3" points="439.9,428.7 438.9,533.8 338.9,533.8 341.4,428.7"></polygon></g>
                                <g><polygon hidden="true" class="hover st1" id="kv4" points="350,358.4 431.8,358.4 431.5,381.7 439.9,381.7 439.9,428.7 341.4,428.7 341.4,380.9 350,380.9 		"></polygon></g>
                                <g><polygon hidden="true" class="hover st1" id="kv5" points="619,267.7 619.5,212.5 353,212.5 352,268 353,358.4 431.8,358.4 431.5,381.7 439.9,381.7 439.9,494.1 620.6,494.1 	"></polygon></g>
                                <g><polygon hidden="true" class="hover st1" id="kv6" points="854,267.9 854,212.5 619.5,212.5 619,267.7 620.6,494.1 854,494.1"></polygon></g>
                                <g><polygon hidden="true" class="hover st1" id="kv7" points="854,349.7 854,267.9 854,212.5 992.7,212.5 992.7,268.2 992.7,494.1 854,494.1 	 	"></polygon></g>
                                <g><polygon hidden="true" class="hover st1" id="kv8" points="1189,212.2 1326.1,212.2 1326.1,267.9 1323.9,492.2 1189,492.2 1186.7,268.2	"></polygon></g>
                                <g><polygon hidden="true" class="hover st1" id="kv9" points="1440.6,268.2 1440.6,212.2 1326.1,212.2 1326.1,267.9 1323.9,492.2 1437.9,492.2"></polygon></g>
                                <g><polygon hidden="true" class="hover st1" id="kv10" points="1488.6,374.3 1570.6,374.3 1570.6,365.6 1573.6,365.6 1573.6,329.3 1579.3,328.9 1579.3,258.8 1572.8,258.8 1573.2,244.4 1569.4,244.4 1569.4,212.2 1440.6,212.2 1440.6,268.2 1437.9,492.2 1480.4,492.2 1480.4,399.6 1488.7,399.6"></polygon></g>
                                <g><polygon hidden="true" class="hover st1" id="kv11" points="1570.6,374.3 1488.6,374.3 1488.7,399.6 1480.4,399.6 1480.4,454.9 1488.3,454.9 1488.8,445.3 1570.6,444.8 1570.6,466.1 1579.3,466.1 1579.3,413 1570.6,413 	"></polygon></g>
                                <g><polygon hidden="true" class="hover st1" id="kv12" points="1511.8,445.2 1570.6,444.8 1570.6,466.1 1579.3,466.1 1581.2,525.2 1579.3,613.1 1575.7,613.1 1575.7,563.1 1480.4,563.1 1480.4,492.2 1480.4,454.9 1488.3,454.9 1488.8,445.3 	"></polygon></g>
                                <g><polygon hidden="true" class="hover st1" id="kv13" points="1304.9,846 1307.6,619.7 1306.4,563.1 1575.7,563.1 1575.7,620.3 1573.7,846"></polygon></g>
                                <g><polygon hidden="true" class="hover st1" id="kv14" points="1306.4,563.1 1069.5,563.1 1069.5,618.6 1069.5,846 1304.9,846 1307.6,619.7"></polygon></g>
                                <g><polygon hidden="true" class="hover st1" id="kv15" points="930,563.1 1069.5,563.1 1069.5,618.6 1069.5,846 930,846 928.5,619.7"></polygon></g>
                            </a>

                            <a href="home/floor">
                                <g><polygon hidden="true" class="hover st2" id="kv1" points="716.8,614.7 674,662.3 681.2,743.7 704.9,749.8 704.7,741.3 717.4,727.6 728.5,730.6 740,715.5
				739.7,705.6 745.3,700.3 740.3,633.5 739.3,633.7 738.9,621.3 			"></polygon></g>
                                <g><polygon hidden="true" class="hover st2" id="kv2" points="754.4,587.5 727.7,617.9 739.1,620.1 740.3,633.5 741.5,633.3 745.3,700.3 752.7,691 780.8,658.1
				777.2,592.8 			"></polygon></g>
                                <g><polygon hidden="true" class="hover st2" id="kv3" points="789.9,534.6 754.3,574.6 754.4,587.5 777.2,592.8 780.8,658.1 804.5,630.3 813.5,632.4 813.5,555.2
				823.5,542.5 			"></polygon></g>
                                <g><polygon hidden="true" class="hover st2" id="kv4" points="823.8,542.5 813.5,555.2 813.5,632.4 845.1,639.8 845.1,564 855.3,550.6 			"></polygon></g>
                                <g><polygon hidden="true" class="hover st2" id="kv5" points="855.3,550.6 845.1,564 845.1,639.8 877.6,648.8 877.6,574.1 887.9,558.7 			"></polygon></g>
                                <g><polygon hidden="true" class="hover st2" id="kv6" points="965.3,578.8 954.5,594.1 936.7,619.3 960,625.9 961.4,701.4 988.8,659.9 988.8,584.5 			"></polygon></g>
                                <g><polygon hidden="true" class="hover st2" id="kv7" points="936.7,619.3 960,625.9 961.4,701.4 928.1,749.8 927.4,684.5 903.6,677.7 903.6,663.3 			"></polygon></g>
                                <g><polygon hidden="true" class="hover st2" id="kv8" points="903.6,677.7 927.4,684.5 928.1,749.8 892.5,805.1 865.4,798.4 864.6,731.1 			"></polygon></g>
                                <g><polygon hidden="true" class="hover st2" id="kv9" points="835.8,763.8 834.8,713.9 787.6,701.2 773.8,716.2 773.8,771.2 823.7,785.9 823.9,777.1 			"></polygon></g>
                                <g><polygon hidden="true" class="hover st2" id="kv10" points="787.6,701.2 773.8,716.2 773.8,771.2 742.7,761.5 739.8,705.4 752.7,691 788,700.3 788.2,700.4"></polygon></g>
                            </a>

                            <a href="home/floor">
                                <g><polygon hidden="true" class="hover st3" id="kv1" points="392.3,789.9 480.4,789.9 568.5,789.9 579,783.2 589.4,776.6 589.4,765.3 589.4,754.1
		591.2,754.1 593,754.1 593,750.1 593,746.1 601.2,739.9 609.3,733.8 603.1,733.8 596.8,733.9 596.8,702.2 596.8,670.6 600,670.6
		603.2,670.5 603.2,657.4 603.2,644.3 600,644.3 596.8,644.3 596.8,575.6 596.8,507 600,507 603.2,507 603.2,493.4 603.2,479.9
		600,479.9 596.8,479.9 596.8,459 596.8,438 600,438 603.2,438 603.2,424.7 603.2,411.5 600,411.5 596.8,411.5 596.8,389.8
		596.8,368.1 600,368.1 603.2,368.1 603.2,354.5 603.2,341 600,341 596.8,341 596.8,335.9 596.8,330.8 560.2,309.3 523.6,287.9
		457.9,287.9 392.3,287.9 392.3,307.8 392.3,327.7 390,327.5 387.7,327.2 387.7,331.8 387.7,336.4 390,336.9 392.3,337.4
		392.3,346.4 392.3,355.3 390,354.8 387.7,354.3 387.7,358.6 387.7,363 390,363.2 392.3,363.5 392.3,372.7 392.3,381.9 390,382.1
		387.7,382.4 387.7,387.7 387.7,393.1 390,392.8 392.3,392.6 392.3,401.8 392.3,411 390,410.7 387.7,410.5 387.7,414.5 387.7,418.6
		390,418.9 392.3,419.1 392.3,428.3 392.3,437.5 390,437.5 387.7,437.5 387.7,441.9 387.7,446.2 390,446.5 392.3,446.7 392.3,455.4
		392.3,464.1 390,464.3 387.7,464.6 387.7,469.2 387.7,473.8 390,473.8 392.3,473.8 392.3,483.2 392.3,492.7 390,492.9 387.7,493.2
		387.7,497.8 387.7,502.4 390,502.1 392.3,501.9 392.3,510.5 392.3,519.2 390,519.5 387.7,519.7 387.7,523.8 387.7,527.9 390,528.2
		392.3,528.4 392.3,538.4 392.3,548.3 390,547.8 387.7,547.3 387.7,551.6 387.7,556 390,556.2 392.3,556.5 392.3,565.9 392.3,575.4
		390,575.9 387.7,576.4 387.7,580.2 387.7,584.1 390,583.8 392.3,583.6 392.3,593 392.3,602.5 390,602.2 387.7,601.9 387.7,606.5
		387.7,611.1 390,611.1 392.3,611.1 392.3,620.1 392.3,629 390,629.5 387.7,630 387.7,635.1 387.7,640.2 390,640.2 392.3,640.2
		392.3,648.2 392.3,656.1 390,656.6 387.7,657.1 387.7,662.2 387.7,667.3 390,667 392.3,666.8 392.3,675.7 392.3,684.7 390,684.9
		387.7,685.2 387.7,690 387.7,694.9 390,694.6 392.3,694.4 392.3,702.8 392.3,711.2 390,711 387.7,710.7 387.7,716.6 387.7,722.5
		390,722.2 392.3,721.9 392.3,755.9 	"></polygon></g>
                                <g><polygon hidden="true" class="hover st3" id="kv2" points="645.1,417.6 621,408.2 596.8,398.7 596.8,405.1 596.8,411.5 600,411.5 603.2,411.5
		603.2,424.7 603.2,438 600,438 596.8,438 596.8,459 596.8,479.9 600,479.9 603.2,479.9 603.2,493.4 603.2,507 600,507 596.8,507
		596.8,575.6 596.8,644.3 600,644.3 603.2,644.3 603.2,657.4 603.2,670.5 600,670.6 596.8,670.6 596.8,702.2 596.8,733.8
		611.4,733.8 625.9,733.8 635.5,727.9 645.1,721.9 645.1,569.8 	"></polygon></g>
                                <g><polygon hidden="true" class="hover st3" id="kv3" points="596.8,368.1 600,368.1 603.2,368.1 603.2,362.8 603.2,357.6 624.2,357.6 645.1,357.6
		658.3,365.3 671.5,373 695.1,373.1 718.6,373.2 718.6,540.9 718.6,708.7 695,708.3 671.4,707.9 658.2,714.9 645.1,721.9
		645.1,569.8 645.1,417.6 621,408.2 596.8,398.7 596.8,383.4 	"></polygon></g>
                                <g><polygon hidden="true" class="hover st3" id="kv4" points="841.9,373.7 780.3,373.4 718.6,373.2 718.6,540.9 718.6,708.7 730.1,708.7 741.6,708.7
		741.6,581.8 741.6,454.9 791.8,455.1 841.9,455.3 841.9,414.5 	"></polygon></g>
                                <g class="hover"><polygon hidden="true" class="hover st3" id="kv5" points="841.9,373.2 915.3,373.2 988.7,373.2 988.7,414 988.7,454.9 915.3,455.1 841.9,455.3 841.9,414.2 	"></polygon></g>
                                <g><polygon hidden="true" class="hover st3" id="kv6" points="988.7,454.9 1085.6,455.1 1182.4,455.3 1182.4,563.2 1182.4,671.1 1216,670.8
		1249.7,670.5 1253.7,673.8 1257.7,677.2 1257.7,680.1 1257.7,683.1 1243.3,683.1 1228.9,683.1 1228.8,695.6 1228.7,708 1205.6,708
		1182.4,708 1182.4,581.6 1182.4,455.3 1147.7,455.3 1113.1,455.3 1112.7,414.2 1112.3,373.2 1050.5,373.2 988.7,373.2 988.7,414
		"></polygon></g>
                                <g><polygon hidden="true" class="hover st3" id="kv7" points="1249.7,683 1253.7,683.1 1257.7,683.1 1257.7,680.1 1257.7,677.2 1253.7,673.8
		1249.7,670.5 1249.7,646.4 1249.7,622.2 1246.9,622.4 1244.1,622.6 1244.1,612.9 1244.1,603.1 1246.9,603.1 1249.7,603.1
		1249.7,559 1249.7,515 1246.9,514.8 1244.1,514.6 1244.1,505.2 1244.1,495.9 1246.9,495.7 1249.7,495.5 1249.7,478.4 1249.7,461.4
		1248,461.2 1246.4,461 1246.4,450.9 1246.4,440.7 1248,440.3 1249.7,439.9 1249.7,424.6 1249.7,409.3 1246.9,408.7 1244.1,408.2
		1244.1,398 1244.1,387.9 1246.9,387.7 1249.7,387.5 1249.7,384 1249.7,380.6 1266.3,370.6 1282.9,360.7 1282.9,540.1 1282.9,719.6
		1266.3,710.1 1249.7,700.5 1249.7,691.7 	"></polygon></g>
                                <g><polygon hidden="true" class="hover st3" id="kv8" points="1282.9,360.7 1308.9,346.1 1334.8,331.6 1390,331.6 1445.1,331.6 1445.1,338.8
		1445.1,346.1 1450.3,346.1 1455.5,346.1 1455.5,358 1455.5,369.9 1450.3,369.9 1445.1,369.9 1445.1,370.8 1445.1,371.8
		1427.7,371.6 1410.3,371.4 1372.6,385.6 1334.8,399.7 1334.8,415.5 1334.8,431.3 1332.9,431.3 1331,431.3 1330.9,435 1330.7,438.8
		1332.8,438.9 1334.8,439 1334.8,446.5 1334.8,454.1 1333.1,454.1 1331.4,454.1 1331.5,458.1 1331.5,462 1333.2,462.2 1334.8,462.3
		1334.8,469.7 1334.8,477.2 1332.7,477.2 1330.6,477.2 1330.7,481.1 1330.7,485 1332.8,485.1 1334.8,485.3 1334.8,492.8
		1334.8,500.3 1333,500.3 1331.3,500.3 1331.3,504.3 1331.3,508.2 1333,508.2 1334.8,508.1 1334.8,516.1 1334.8,524.1 1332.8,524
		1330.7,523.9 1330.8,527.5 1330.9,531 1332.8,531 1334.8,531 1334.8,538.4 1334.8,545.9 1333,546 1331.3,546 1331.2,550
		1331.1,553.9 1333,553.9 1334.8,553.9 1334.8,561.9 1334.8,569.9 1333,569.9 1331.3,569.9 1331.2,573.5 1331.1,577 1333,577.1
		1334.8,577.2 1334.7,584.5 1334.5,591.8 1332.9,592 1331.3,592.3 1331.4,596.2 1331.4,600.2 1333.1,600.2 1334.8,600.3
		1334.9,608.1 1335,615.9 1333,615.9 1331.1,616 1331.1,619.6 1331.1,623.1 1333,623.1 1334.8,623 1334.8,631.1 1334.8,639.2
		1333,639.2 1331.3,639.1 1331.3,643 1331.3,646.9 1333,646.9 1334.8,647 1334.8,654.5 1334.8,661.9 1333,661.9 1331.1,661.9
		1331.1,665.5 1331,669.1 1332.9,669 1334.8,669 1334.8,677.1 1334.8,685.2 1332.9,685.2 1331,685.2 1331,689.4 1331,693.6
		1332.9,693.5 1334.8,693.3 1334.8,700.6 1334.8,707.9 1332.9,708 1330.9,708.2 1331,711.9 1331.1,715.6 1333,715.6 1334.8,715.6
		1334.8,725.2 1334.8,734.8 1323.3,734.8 1311.9,734.8 1297.4,727.2 1282.9,719.6 1282.9,540.1 	"></polygon></g>
                                <g><polygon hidden="true" class="hover st3" id="kv9" points="1409.5,371.8 1475.8,371.8 1542,371.8 1543,581.8 1543.9,791.9 1476.7,791.9
		1409.5,791.9 1408.6,790.9 1407.6,790 1353,790.9 1298.5,791.9 1298.5,769.1 1298.5,746.3 1289.3,740.6 1280.1,734.8 1307.5,734.8
		1334.8,734.8 1334.8,725.2 1334.8,715.6 1333,715.6 1331.1,715.6 1331,711.9 1330.9,708.2 1332.9,708 1334.8,707.9 1334.8,700.6
		1334.8,693.3 1332.9,693.5 1331,693.6 1331,689.4 1331,685.2 1332.9,685.2 1334.8,685.2 1334.8,677.1 1334.8,669 1332.9,669
		1331,669.1 1331.1,665.5 1331.1,661.9 1333,661.9 1334.8,661.9 1334.8,654.5 1334.8,647 1333,646.9 1331.3,646.9 1331.3,643
		1331.3,639.1 1333,639.2 1334.8,639.2 1334.8,631.1 1334.8,623 1333,623.1 1331.1,623.1 1331.1,619.6 1331.1,616 1333,615.9
		1335,615.9 1334.9,608.1 1334.8,600.3 1333.1,600.2 1331.4,600.2 1331.4,596.2 1331.3,592.3 1332.9,592 1334.5,591.8 1334.7,584.5
		1334.8,577.2 1333,577.1 1331.1,577 1331.2,573.5 1331.3,569.9 1333,569.9 1334.8,569.9 1334.8,561.9 1334.8,553.9 1333,553.9
		1331.1,553.9 1331.2,550 1331.3,546 1333,546 1334.8,545.9 1334.8,538.4 1334.8,531 1332.8,531 1330.9,531 1330.8,527.5
		1330.7,523.9 1332.8,524 1334.8,524.1 1334.8,516.1 1334.8,508.1 1333,508.2 1331.3,508.2 1331.3,504.3 1331.3,500.3 1333,500.3
		1334.8,500.3 1334.8,492.8 1334.8,485.3 1332.8,485.1 1330.7,485 1330.7,481.1 1330.6,477.2 1332.7,477.2 1334.8,477.2
		1334.8,469.7 1334.8,462.3 1333.2,462.2 1331.5,462 1331.5,458.1 1331.4,454.1 1333.1,454.1 1334.8,454.1 1334.8,446.5 1334.8,439
		1332.8,438.9 1330.7,438.8 1330.9,435 1331,431.3 1332.9,431.3 1334.8,431.3 1334.8,415.9 1334.8,400.5 1372.2,386.1 	"></polygon></g>
                                <g><polygon hidden="true" class="hover st3" id="kv10" points="966.2,454.9 1182.4,455.3 1182.4,721.9 1185.3,721.9 1185.3,733.8 1280.1,734.8
		1298.5,746.3 1298.5,791.9 965.3,791.9 	"></polygon></g>
                                <g><polygon hidden="true" class="hover st3" id="kv11" points="965.3,791.9 966.2,454.9 741.6,454.9 741.6,721.9 739,721.9 739,733.8 609.3,733.8 593,746.1 593,754.1 613.4,754.2 613.9,791.9 	"></polygon></g>

                            </a>
                            <a href="home/floor">
                                <g><polygon hidden="true" class="hover st4" id="kv1" points="252,224 368.2,224 484.4,224 484.4,349.6 484.4,475.2 410.4,475.2 336.3,475.2 336.1,471.9
		335.8,468.6 332.5,468.6 329.3,468.6 329.3,454.2 329.3,439.8 290.6,440 252,440.2 252,448.1 252,456 250.2,456 248.4,456
		248.4,365.8 248.4,275.6 250.2,275.6 252,275.6 252,249.8 	"></polygon></g>
                                <g><polygon hidden="true" class="hover st4" id="kv11" points="904.3,803.6 1009.6,803.6 1114.9,803.6 1114.9,742.6 1114.9,681.6 1115.7,681.6
		1116.5,681.6 1116.5,617 1116.5,552.5 1010.4,552.5 904.3,552.5 904.3,678 	"></polygon></g>
                                <g><polygon hidden="true" class="hover st4" id="kv11" points="691,224 691,349.6 691,475.2 587.7,475.2 484.4,475.2 484.4,349.6 484.4,224 587.7,224
			"></polygon></g>
                                <g><polygon hidden="true" class="hover st4" id="kv11" points="691,295.3 790.1,295.3 889.1,295.3 889.1,309.8 889.1,324.3 892.1,324.3 895.2,324.3
		895.2,335.9 895.2,347.6 892.1,347.5 889.1,347.4 889.1,355.4 889.1,363.5 850.9,363.5 812.8,363.5 812.8,375.6 812.8,387.7
		809.1,387.7 805.5,387.7 805.5,431.5 805.5,475.2 748.3,475.2 691,475.2 691,385.2 	"></polygon></g>
                                <g><polygon hidden="true" class="hover st4" id="kv11" points="812.8,554.5 850.9,554.5 889.1,554.5 889.1,547 889.1,539.5 892.1,539.5 895.2,539.5
		895.2,447.6 895.2,355.7 892.1,355.7 889.1,355.7 889.1,359.6 889.1,363.5 850.9,363.5 812.8,363.5 812.8,375.6 812.8,387.7
		809.1,387.7 805.5,387.7 805.5,431.5 805.5,475.2 805.5,483.5 805.5,491.8 807.4,491.8 809.3,491.8 809.2,521.9 809.1,552
		810.9,552 812.8,552 812.8,553.3 	"></polygon></g>
                                <g><polygon hidden="true" class="hover st4" id="kv11" points="1232.7,626.2 1174.6,626.2 1116.5,626.2 1116.5,653.9 1116.5,681.6 1115.7,681.6
		1114.9,681.6 1114.9,742.6 1114.9,803.6 1173.8,803.6 1232.7,803.6 1232.7,714.9 	"></polygon></g>
                                <g><polygon hidden="true" class="hover st4" id="kv11" points="699.4,803.6 787.1,803.6 874.8,803.6 874.8,795.7 874.8,787.9 889.5,787.9 904.3,787.9
		904.3,671.2 904.3,554.5 899.7,554.5 895.2,554.5 892.1,554.5 889.1,554.5 850.9,554.5 812.8,554.5 807.3,554.5 801.8,554.5
		750.6,554.5 699.4,554.5 699.4,679 	"></polygon></g>
                                <g><polygon hidden="true" class="hover st4" id="kv11" points="699.4,554.5 699.4,679 699.4,803.6 595.9,803.6 492.5,803.6 492.5,679 492.5,554.5
		595.9,554.5 	"></polygon></g>
                                <g><polygon hidden="true" class="hover st4" id="kv11" points="375,554.5 433.7,554.5 492.5,554.5 492.5,680.5 492.5,806.5 433.7,806.5 375,806.5
		375,680.5 	"></polygon></g>
                                <g><polygon hidden="true" class="hover st4" id="kv11" points="375,633.7 375,630 375,626.2 375,590.4 375,554.5 355.7,554.5 336.3,554.5 336.3,546.5
		336.3,538.6 292.4,538.6 248.4,538.6 248.4,672.5 248.4,806.5 311.7,806.5 375,806.5 375,720.1 	"></polygon></g>
                                <g><polygon hidden="true" class="hover st4" id="kv11" points="252,497.6 294.1,497.6 336.3,497.6 336.3,518.1 336.3,538.6 292.4,538.6 248.4,538.6
		248.4,518.1 248.4,497.6 250.2,497.6 	"></polygon></g>
                                <g><polygon hidden="true" class="hover st4" id="kv11" points="252,440.2 290.6,440 329.3,439.8 329.3,454.2 329.3,468.6 332.5,468.6 335.8,468.6
		336.1,483.1 336.3,497.6 292.4,497.6 248.4,497.6 248.4,476.8 248.4,456 250.2,456 252,456 252,448.1 	"></polygon></g>
                            </a>
                            <a href="home/floor">
                                <g><polygon hidden="true" class="hover st5" id="kv10" points="1022.9,275.6 1022.9,375.4 1022.9,475.2 1124.5,475.2 1226,475.2 1226,403 1226,330.9
		1224.1,330.9 1222.3,330.9 1222.3,303.2 1222.3,275.6 1122.6,275.6 	"></polygon></g>
                                <g><polygon hidden="true" class="hover st5" id="kv10" points="1222.3,330.9 1222.3,277.5 1222.3,224 1336.7,224 1451.2,224 1451.2,349.6 1451.2,475.2
		1338.6,475.2 1226,475.2 1226,403 1226,330.9 1224.1,330.9 	"></polygon></g>
                                <g><polygon hidden="true" class="hover st5" id="kv10" points="1451.2,224 1542.5,224 1633.9,224 1633.9,257 1633.9,290 1595.2,290 1556.5,290 1556.5,294.5
		1556.5,299.1 1554.7,299.1 1552.8,299.1 1552.9,387.1 1553.1,475.2 1502.2,475.2 1451.2,475.2 1451.2,349.6 	"></polygon></g>
                                <g><polygon hidden="true" class="hover st5" id="kv10" points="1552.8,299.1 1554.7,299.1 1556.5,299.1 1556.5,294.5 1556.5,290 1596.9,290 1637.3,290
		1637.3,333.6 1637.3,377.1 1595,377.1 1552.8,377.1 1552.8,338.1 	"></polygon></g>
                                <g><polygon hidden="true" class="hover st5" id="kv10" points="1552.8,552.5 1552.9,513.8 1553.1,475.2 1552.9,426.1 1552.8,377.1 1595,377.1 1637.3,377.1
		1637.3,464.8 1637.3,552.5 1634,552.5 1630.8,552.5 1621.5,552.5 1612.3,552.5 1582.5,552.5 	"></polygon></g>
                                <g><polygon hidden="true" class="hover st5" id="kv10" points="1442.4,552.5 1539.8,552.5 1637.3,552.5 1637.3,678 1637.3,803.6 1539.8,803.6 1442.4,803.6
		1442.4,678 	"></polygon></g>
                                <g><polygon hidden="true" class="hover st5" id="kv10" points="1232.7,552.5 1337.5,552.5 1442.4,552.5 1442.4,678 1442.4,803.6 1337.5,803.6 1232.7,803.6
		1232.7,678 	"></polygon></g>
                            </a>

                    </div>
                </div>
            </div>


            <script>
                const mytishi_img = document.querySelector('.mytishi-img')
                const building_selection = document.querySelectorAll('.build-selection0')
                for (let i = 0; i < building_selection.length; i++) {
                    building_selection[i].addEventListener('click', function (e){
                        document.querySelector('#back-btn2').setAttribute('hidden', true)
                        document.getElementById("back-btn1").removeAttribute("hidden")
                        mytishi_img.setAttribute('src', '<?=SITE_URL?>templates/default/assets/imgs/'+ e.target.id +'.jpg')
                        switch (e.target.id){
                            case 'first-house-mytishi':
                                document.querySelectorAll('.st1').forEach(function (ev) {
                                    e.onclick = ev.removeAttribute('hidden')
                                })
                                break
                            case 'second-house-mytishi':
                                document.querySelectorAll('.st2').forEach(function (ev){
                                    e.onclick = ev.removeAttribute('hidden')
                                })
                                break
                            case 'third-house-mytishi':
                                document.querySelectorAll('.st3').forEach(function (ev){
                                    e.onclick = ev.removeAttribute('hidden')
                                })
                                break
                            case 'fourth-house-mytishi':
                                document.querySelectorAll('.st4').forEach(function (ev){
                                    e.onclick = ev.removeAttribute('hidden')
                                })
                                break
                            case 'fifth-house-mytishi':
                                document.querySelectorAll('.st4').forEach(function (ev){
                                    e.onclick = ev.removeAttribute('hidden')
                                })
                                break
                            case 'sixth-house-mytishi':
                                document.querySelectorAll('.st5').forEach(function (ev){
                                    e.onclick = ev.removeAttribute('hidden')
                                })
                                break
                        }
                        document.querySelectorAll('.build-selection0').forEach(function (ev){
                            e.onclick = ev.setAttribute('hidden', true)
                        })
                        })

                    }
                const first_sections = document.querySelectorAll('.st1')
                for (let i = 0; i < first_sections.length; i++) {
                    first_sections[i].addEventListener('click', function (e){

                    })
                }
                function back(){
                    console.log(document.querySelector("#back-btn2").getAttribute('hidden'))
                    document.querySelector("#back-btn2").removeAttribute('hidden')
                    document.querySelector(".mytishi-img").setAttribute("src", "<?=SITE_URL?>templates/default/assets/imgs/main-plan-mytishi.jpg")
                        document.querySelectorAll('.hover').forEach(function (ev) {
                            ev.setAttribute('hidden', true)
                        })
                    document.querySelectorAll(".build-selection0").forEach(function (el) {
                        el.removeAttribute("hidden");
                    });
                    document.getElementById("back-btn1").setAttribute("hidden", true)
                }
                function back_tomain(){
                    window.location.href = '/projects'
                }


            </script>
            <style>
                .back-btn{
                    position: absolute; z-index: 999; top: 40px; left: 40px; font-size: 24px;
                    border: none;
                    background-color: white;
                    color: #007bfb;
                    width: 3%;
                    height: 5%;
                    border-radius: 35px;
                    transition: all .3s;
                }
                .back-btn:hover{
                    background-color: #007bfb;
                    color: white;
                    border-radius: 8px;
                    transition: all .3s;
                }
                .mytishi-img{
                    position: relative;
                    width: 100%; border-radius: 50px; border: solid 4px #404E67; z-index: 1;
                }
                .building-selection{
                    position: absolute;
                    top: 0;
                    left: 0;
                    z-index: 2;
                    display: block;
                    width: 100%;
                    height: 100%;
                }
                polygon{
                    position: static;
                }
                .card-head{
                    display: flex;
                    justify-content: space-between;
                    margin-left: 80px;
                    margin-right: 65px;
                }
                .title-head{
                    font-size: 32px;
                }
                .main-head{
                    margin-top: 15px;
                    font-size: 20px;
                    color: rgba(101, 101, 101, 0.85);
                    cursor: pointer;
                }

                .visual_poly {
                    fill: rgba(0, 123, 251, .40);
                    stroke: #007bfb;
                    cursor: pointer;
                    transition: .3s;
                }
                .visual_poly:hover{
                    fill: rgba(0, 123, 251, .10);
                    transition: .3s;
                }
                .st1 {
                    fill: rgba(0, 123, 251, 0.3);
                    stroke: #007bfb;
                    cursor: pointer;
                    transition: .3s;
                }
                .st1:hover{
                    fill: rgba(0, 123, 251, .10);
                    transition: .3s;
                }
                .st2 {
                    fill: rgba(0, 123, 251, 0.3);
                    stroke: #007bfb;
                    cursor: pointer;
                    transition: .3s;
                }
                .st2:hover{
                    fill: rgba(0, 123, 251, .10);
                    transition: .3s;
                }
                .st3 {
                    fill: rgba(0, 123, 251, 0.3);
                    stroke: #007bfb;
                    cursor: pointer;
                    transition: .3s;
                }
                .st3:hover{
                    fill: rgba(0, 123, 251, .10);
                    transition: .3s;
                }
                .st4 {
                    fill: rgba(0, 123, 251, 0.3);
                    stroke: #007bfb;
                    cursor: pointer;
                    transition: .3s;
                }
                .st4:hover{
                    fill: rgba(0, 123, 251, .10);
                    transition: .3s;
                }
                .st5 {
                    fill: rgba(0, 123, 251, 0.3);
                    stroke: #007bfb;
                    cursor: pointer;
                    transition: .3s;
                }
                .st5:hover{
                    fill: rgba(0, 123, 251, .10);
                    transition: .3s;
                }
            </style>

        </div>

        <aside class="right-sidebar">
            <div class="sidebar-chat" data-plugin="chat-sidebar">
                <div class="sidebar-chat-info">
                </div>
            </div>
        </aside>

        <div class="chat-panel" hidden>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <a href="javascript:void(0);"><i class="ik ik-message-square text-success"></i></a>
                    <span class="user-name">John Doe</span>
                    <button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="card-body">
                    <div class="widget-chat-activity flex-1">
                        <div class="messages">
                            <div class="message media reply">
                                <figure class="user--online">
                                    <a href="#">
                                        <img src="img/users/3.jpg" class="rounded-circle" alt="">
                                    </a>
                                </figure>
                                <div class="message-body media-body">
                                    <p>Epic Cheeseburgers come in all kind of styles.</p>
                                </div>
                            </div>
                            <div class="message media">
                                <figure class="user--online">
                                    <a href="#">
                                        <img src="img/users/1.jpg" class="rounded-circle" alt="">
                                    </a>
                                </figure>
                                <div class="message-body media-body">
                                    <p>Cheeseburgers make your knees weak.</p>
                                </div>
                            </div>
                            <div class="message media reply">
                                <figure class="user--offline">
                                    <a href="#">
                                        <img src="img/users/5.jpg" class="rounded-circle" alt="">
                                    </a>
                                </figure>
                                <div class="message-body media-body">
                                    <p>Cheeseburgers will never let you down.</p>
                                    <p>They'll also never run around or desert you.</p>
                                </div>
                            </div>
                            <div class="message media">
                                <figure class="user--online">
                                    <a href="#">
                                        <img src="img/users/1.jpg" class="rounded-circle" alt="">
                                    </a>
                                </figure>
                                <div class="message-body media-body">
                                    <p>A great cheeseburger is a gastronomical event.</p>
                                </div>
                            </div>
                            <div class="message media reply">
                                <figure class="user--busy">
                                    <a href="#">
                                        <img src="img/users/5.jpg" class="rounded-circle" alt="">
                                    </a>
                                </figure>
                                <div class="message-body media-body">
                                    <p>There's a cheesy incarnation waiting for you no matter what you palete preferences are.</p>
                                </div>
                            </div>
                            <div class="message media">
                                <figure class="user--online">
                                    <a href="#">
                                        <img src="img/users/1.jpg" class="rounded-circle" alt="">
                                    </a>
                                </figure>
                                <div class="message-body media-body">
                                    <p>If you are a vegan, we are sorry for you loss.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="javascript:void(0)" class="card-footer" method="post">
                    <div class="d-flex justify-content-end">
                        <textarea class="border-0 flex-1" rows="1" placeholder="Type your message here"></textarea>
                        <button class="btn btn-icon" type="submit"><i class="ik ik-arrow-right text-success"></i></button>
                    </div>
                </form>
            </div>
        </div>

        <?php
        require_once "include/page-footer.php";
        ?>

    </div>
</div>












<div class="modal fade apps-modal" id="appsModal" tabindex="-1" role="dialog" aria-labelledby="appsModalLabel" aria-hidden="true" data-backdrop="false">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ik ik-x-circle"></i></button>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="quick-search">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 ml-auto mr-auto">
                            <div class="input-wrap">
                                <input type="text" id="quick-search" class="form-control" placeholder="Search..." />
                                <i class="ik ik-search"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="container">
                    <div class="apps-wrap">
                        <div class="app-item">
                            <a href="#"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                        </div>
                        <div class="app-item dropdown">
                            <a href="#" class="dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-command"></i><span>Ui</span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-mail"></i><span>Message</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-users"></i><span>Accounts</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-shopping-cart"></i><span>Sales</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-briefcase"></i><span>Purchase</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-server"></i><span>Menus</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-clipboard"></i><span>Pages</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-message-square"></i><span>Chats</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-map-pin"></i><span>Contacts</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-box"></i><span>Blocks</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-calendar"></i><span>Events</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-bell"></i><span>Notifications</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-pie-chart"></i><span>Reports</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-layers"></i><span>Tasks</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-edit"></i><span>Blogs</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-settings"></i><span>Settings</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-more-horizontal"></i><span>More</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .footer{
        margin-top: 200px;
    }
    .card{
        cursor: pointer;
        border: 2px solid rgba(16, 15, 15, 0.15);
    }
    .card:hover{
        border: 2px solid #007bfb;
    }
    .card-header{
    }
    .card-body{
        border: none;
        padding: 0!important;
    }
    .card-text{
        padding: 20px 20px;
        font-size: 15px;
        color: grey;
    }
</style>
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"> </script>
<?php
require_once "include/footer.php";
?>
