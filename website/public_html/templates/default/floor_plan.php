<link rel="stylesheet" href="<?=SITE_URL?>templates/default/assets/src/css/modal.css">
<link rel="stylesheet" href="<?=SITE_URL?>templates/default/assets/src/css/modal_new.css">
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
        <div class="container" style="position: relative">
                <div class="img-plan" style="position: relative;">
                    <div class="flat-selection-wrap" style="position: absolute; display: flex">
                     <img src="<?=SITE_URL?>/templates/default/assets/imgs/floor_imgs/<?=$this->section_img?>" alt="план проекта" class="flat-img" id="floor-img" style="">
                        <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="2.0" x="0px" viewBox="<?=$this->viewBox?>" class="flat-selection">

                            <?php foreach ($this->sectionData as $key => $apartment): ?>
                                    <g onmouseout="hide()"  class="visual_poly" id="<?=$apartment['id_apartments']?>"><path  d="<?=$apartment['polygon_points']?>" id="<?=$apartment['id_apartments']?>"></path></g>
                            <?php endforeach; ?>

                        </svg>
                        <div class="modal-focus" id="tooltip1">
                            <div class="modalcard-body">
                                123
                            </div>
                        </div>
                    </div>
        </div>
    </div>
            <script>
                 const modal = document.querySelector('.modal-focus')
                const vp = document.querySelectorAll('.visual_poly')
                 const pd = document.querySelectorAll('path')
                const fsw = document.querySelector('.flat-selection-wrap')
                 const modal_body = document.querySelector('.modalcard-body')
                // const modal = document.createElement('div')
                 for (let i = 0; i < vp.length; i++) {
                     vp[i].onmouseover =  function (){
                         modal_body.innerHTML = ''
                         console.log('123')
                         modal.style.display = "flex";
                         let rect = vp[i].getBoundingClientRect()
                         modal.style.top = rect.top + 'px'
                         modal.style.left = rect.left -100 + 'px'
                     }
                 }

                    function hide() {
                        modal.style.display = 'none'
                            }
            </script>



                        <?php foreach ($this->sectionData as $key => $apartment): ?>
                            <a class="btn-modal" href="#modal-block_<?=$apartment['id_apartments']?>" id="modal-window_<?=$apartment['id_apartments']?>" style="position: absolute;top: 1000px" hidden="true"></a>
                            <div class="modal-block" id="modal-block_<?=$apartment['id_apartments']?>">
                                <a class="close-block" href="#close-block">✕</a>

                                <div class="modal-block_title">
                                    <div class="modal-block_title_apartment">
                                        Квартира №<?=$apartment['apartment_number']?>
                                    </div>
                                    <div>
                                        56.07 м²
                                    </div>
                                </div>
                                <br>

                                <form action="/home/apartment/update" method="POST">

                                    <input name="id_apartment" hidden value="<?=$apartment['id_apartments']?>">
                                    <input name="id_section" hidden value="<?=$_GET['id_section']?>">
                                    <input name="floor" hidden value="<?=$_GET['floor']?>">

                                <div class="modal-block_body">
                                    <div class="modal-block_body_img">
<!--                                        <img src="" alt="план квартиры" id="modal-block-img">-->
                                    </div>
                                    <button type="button" class="btn btn-dark">Видео</button>
                                    <div class="modal-block_line"></div>

                                    <div class="modal-block_body_title">
                                        Отчет
                                    </div>
                                    <div class="modal-block_body_checkbox">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" <?php if($apartment['sockets'] == 1) echo "checked"?> name="sockets">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Розетки
                                        </label>
                                        <br>

                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" <?php if($apartment['switches'] == 1) echo "checked"?> name="switches">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Выключатели
                                        </label>
                                        <br>

                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" <?php if($apartment['toilet'] == 1) echo "checked"?> name="toilet">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Унитаз
                                        </label>
                                        <br>

                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" <?php if($apartment['sink'] == 1) echo "checked"?> name="sink">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Раковина
                                        </label>
                                        <br>

                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" <?php if($apartment['bath'] == 1) echo "checked"?> name="bath">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Ванна
                                        </label>
                                        <br>

                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" <?php if($apartment['floor_finishing'] == 1) echo "checked"?> name="floor_finishing">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Чистовая отделка пола
                                        </label>
                                        <br>

                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" <?php if($apartment['draft_floor_department'] == 1) echo "checked"?> name="draft_floor_department">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Чернова отдела пола
                                        </label>
                                        <br>

                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" <?php if($apartment['ceiling_finishing'] == 1) echo "checked"?> name="ceiling_finishing">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Чистовая отделе потолка
                                        </label>
                                        <br>

                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" <?php if($apartment['draft_ceiling_finish'] == 1) echo "checked"?> name="draft_ceiling_finish">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Черновая отделка потолка
                                        </label>
                                        <br>

                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" <?php if($apartment['wall_finishing'] == 1) echo "checked"?> name="wall_finishing">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Чистовая отделка стен
                                        </label>
                                        <br>

                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" <?php if($apartment['draft_wall_finish'] == 1) echo "checked"?> name="draft_wall_finish">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Черновая отделка стен
                                        </label>
                                        <br>

                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" <?php if($apartment['windowsill'] == 1) echo "checked"?> name="windowsill">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Подоконник
                                        </label>
                                        <br>

                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" <?php if($apartment['kitchen'] == 1) echo "checked"?> name="kitchen">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Кухня
                                        </label>
                                        <br>

                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" <?php if($apartment['slopes'] == 1) echo "checked"?> name="slopes">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Откосы
                                        </label>
                                        <br>

                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" <?php if($apartment['doors'] == 1) echo "checked"?> name="doors">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Двери
                                        </label>
                                        <br>
                                    </div>

                                    <br><br>
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                                </form>

                            </div>
                        <?php endforeach; ?>



                        <div class="floor_selector">
<!--                            <div id="iter-plus" class="floor-selector">+</div>-->
                            <a href="<?=SITE_URL?>project?id_project=100"><div class="floor-selector"><</div></a>
                            <?php for ($i = ++$this->floor_count; $i != 1; $i--): ?>
                                <a href="<?=SITE_URL?>home/floor?id_section=<?=$this->id_section?>&floor=<?=$i?>"><div id="floor-<?=$i?>" class="floor-selector"><?=$i?></div></a>
                            <?php endfor; ?>
<!--                            <div id="floor-5" class="floor-selector">5</div>-->
<!--                            <div id="floor-4" class="floor-selector">4</div>-->
<!--                            <div id="floor-3" class="floor-selector">3</div>-->
<!--                            <div id="floor-2" class="floor-selector">2</div>-->
<!--                            <div id="floor-1" class="floor-selector">1</div>-->
<!--                            <div id="back-btn" class="floor-selector"><</div>-->

<!--                            <div id="iter-minus" class="floor-selector">-</div>-->
                        </div>

        </div>
        <script>
            const clickable_block = document.querySelectorAll('.visual_poly')
            //const modal_block = document.getElementById("modal-window")
            const modal_img = document.getElementById("modal-block-img")
            for (let i = 0; i < clickable_block.length; i++) {
                clickable_block[i].onclick = function (e) {
                    console.log("modal-window_" + clickable_block[i].id);
                    var modal_block = document.getElementById("modal-window_" + clickable_block[i].id)
                    modal_block.click()
                    modal_img.setAttribute("src", "<?=SITE_URL?>templates/default/assets/imgs/" + e.target.id + ".png")
                }
            }
        </script>
        <style>
            .floor_selector{
                position: relative;
                z-index: 999;
                width: 3%;
            }
            .floor-selector{
                padding: 8px 8px;
                margin-top: 10px;
                border: 1px solid #ddd;
                width: 35px;
                text-align: center;
                border-radius: 30px;
                background-color: white;
                transition: .5s;
                cursor: pointer;
            }
            .floor-selector:hover{
                background-color: #0066cc;
                color: white;
                transition: .5s;
            }
            .flat-img{
                position: relative;
                width: 100%; z-index: 1;
            }
            .flat-selection{
                position: absolute;
                top: 0;
                left: 0;
                z-index: 2;
                display: block;
                width: 100%;
                height: 100%;
            }
            .visual_poly {
                fill: rgba(0, 123, 251, .40);
                /*stroke: #007bfb;*/
                cursor: pointer;
                transition: .3s;
            }
            .visual_poly:hover{
                fill: rgba(0, 123, 251, .07);
                transition: .3s;
            }
        </style>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</body>

