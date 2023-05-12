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
        <div class="container" style="position: relative">
                <div class="img-plan" style="position: relative;">
                    <div class="flat-selection-wrap" style="position: absolute">
                     <img src="<?=SITE_URL?>templates/default/assets/imgs/план проекта.png" alt="план проекта" class="flat-img">
                        <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="2.0" x="0px" viewBox="0 0 1920 1080" class="flat-selection" >
                            <g class="visual_poly"><polygon points="340,-980  340,-490  900,-490 900,-980 " id="first_flat"></polygon></g>
                            <g class="visual_poly"><polygon points="340,-490  340,0  840,0 840,-490 "></polygon></g>
                            <g class="visual_poly"><polygon points="340,0  340,600  840,600 840,0 "></polygon></g>
                            <g class="visual_poly"><polygon points="340,600  340,1115  840,1115 840,600 "></polygon></g>
                            <g class="visual_poly"><polygon points="340,1115  340,1440  840,1440 840,1115 "></polygon></g>
                            <g class="visual_poly"><polygon points="340,1440  340,1945  900,1945 900,1440 "></polygon></g>
                            <g class="visual_poly"><polygon points="899,-980  899,-490  1465,-490 1465,-980 "></polygon></g>
                            <g class="visual_poly"><polygon points="965,-490  965,0  1465,0 1465,-490 "></polygon></g>
                            <g class="visual_poly"><polygon points="965,0  965,600  1465,600 1465,0 "></polygon></g>
                            <g class="visual_poly"><polygon points="965,600  965,1115  1465,1115 1465,600 "></polygon></g>
                            <g class="visual_poly"><polygon points="965,1115  965,1440  1465,1440 1465,1115 "></polygon></g>
                            <g class="visual_poly"><polygon points="899,1440  899,1945  1465,1945 1465,1440 "></polygon></g>
                </svg>
            </div>
        </div>
    </div>
                        <a class="btn-modal" href="#modal-block" id="modal-window" style="position: absolute;top: 1000px" hidden="true"></a>
                        <div id="modal-block">
                            <a class="close-block" href="#close-block">✕</a>
                            <img src="" alt="план квартиры" id="modal-block-img">
                            <p id="p-flat">6 млн двушка 60кв.м 5 этаж</p>
                        </div>
        </div>
        <script>
            const modal_block = document.getElementById("modal-window")
            const modal_img = document.getElementById("modal-block-img")
            window.onclick = function (e){
                modal_block.click()
                modal_img.setAttribute("src", "<?=SITE_URL?>templates/default/assets/imgs/"+e.target.id+".png")
            }
        </script>
        <style>

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
</body>

