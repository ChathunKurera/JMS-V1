<?php $this->load->view('partial/header'); ?>
<!-- Data Tables -->
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">


</head>
<body>
    <div id="wrapper">
        <?php $this->load->view('partial/author_navigation'); ?>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <?php $this->load->view('partial/top_bar'); ?>
            </div>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2><span class="fa fa-user"></span> Dashboard</h2>
                    <ol class="breadcrumb">
                        <li>
                            Author
                        </li>
                        <li class="active">
                            <strong>Dashboard</strong>
                        </li>
                    </ol>
                </div>
            </div>


            <div class="wrapper wrapper-content animated fadeInRight">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox-content">

                            <div class="panel-heading">
                                <!--<div class="panel-title m-b-md"><h4>Blank Panel with text tabs</h4></div>-->
                                <div class="panel-options">

                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#tab-1">All</a></li>
                                        <li class=""><a data-toggle="tab" href="#tab-2">Published</a></li>
                                        <li class=""><a data-toggle="tab" href="#tab-3">Reviewed</a></li>
                                        <li class=""><a data-toggle="tab" href="#tab-4">Pending Reviews</a></li>
                                    </ul>
                                </div>
                            </div>
                            <?php
//                            var_dump($data);
//                            die();
                            ?>
                            <div class="panel-body">

                                <div class="tab-content">
                                    <div id="tab-1" class="tab-pane active">
                                        <?php foreach ($author_article as $article_data): ?>
                                            <?php if ($article_data->status == "published") { ?>
                                                <div class="media well">
                                                    <div class="media-body">
                                                        <a href="#" style="//margin-right: 10px" class="pull-left"><img height="132" width="92px" alt="Bootstrap Media Preview" src="http://localhost/journalProto/imgs/two.jpg" class="media-object"></a>
                                                        <div class="col-lg-8" >
                                                            <div class="ibox-content">
                                                                <h3 class="media-heading">
                                                                    <?= $article_data->title ?>
                                                                </h3> 

                                                                <span>Author :<?= $article_data->title ?> </span><br/>
                                                                <span>Sub Authors : <?= $article_data->co_authors ?> </span><br/>
                                                                <span>Keywords : <?= $article_data->keyword ?> </span><br/>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 pull-right">
                                                            <a href="<?php echo base_url(); ?>./uploads/FreshCopy.<?= $article_data->file_name ?>" target="_blank"><button type="button" style="margin-bottom: 10px" class="btn btn-w-m btn-default pull-right">Download PDF</button></a>
                                                            <a href="downloads/3282E2E55115.pdf" target="_blank"><button type="button" style="margin-bottom: 10px" class="btn btn-w-m btn-default pull-right">View in Journal</button></a>
                                                        </div>
                                                    </div>

                                                </div> 
                                            <?php } if ($article_data->status == "reviewed") { ?>
                                                <div class="media well">
                                                    <div class="media-body">
                                                        <a href="#" style="//margin-right: 10px" class="pull-left"><img height="132" width="92px" alt="Bootstrap Media Preview" src="http://localhost/journalProto/imgs/two.jpg" class="media-object"></a>
                                                        <div class="col-lg-8" >
                                                            <div class="ibox-content">
                                                                <h3 class="media-heading">
                                                                    <?= $article_data->title ?>
                                                                </h3> 

                                                                <span>Author :<?= $article_data->title ?> </span><br/>
                                                                <span>Sub Authors : <?= $article_data->co_authors ?> </span><br/>
                                                                <span>Keywords : <?= $article_data->keyword ?> </span><br/>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 pull-right">
                                                            <a href="<?php echo base_url(); ?>./uploads/FreshCopy.<?= $article_data->file_name ?>" target="_blank"><button type="button" style="margin-bottom: 10px" class="btn btn-w-m btn-default pull-right">Download PDF</button></a>
                                                            <a href="" target="_blank"><button type="button" style="margin-bottom: 10px" class="btn btn-w-m btn-default pull-right">View Review</button></a>
                                                            <a href="" target="_blank"><button type="button" style="margin-bottom: 10px" class="btn btn-w-m btn-default pull-right">Submit for Camera Ready</button></a>
                                                        </div>
                                                    </div>

                                                </div> 
                                            <?php } if ($article_data->status == "assigned" || $article_data->status == "pending") { ?>
                                                <div class="media well">
                                                    <div class="media-body">
                                                        <a href="#" style="//margin-right: 10px" class="pull-left"><img height="132" width="92px" alt="Bootstrap Media Preview" src="http://localhost/journalProto/imgs/two.jpg" class="media-object"></a>
                                                        <div class="col-lg-8" >
                                                            <div class="ibox-content">
                                                                <h3 class="media-heading">
                                                                    <?= $article_data->title ?>
                                                                </h3> 

                                                                <span>Author :<?= $article_data->title ?> </span><br/>
                                                                <span>Sub Authors : <?= $article_data->co_authors ?> </span><br/>
                                                                <span>Keywords : <?= $article_data->keyword ?> </span><br/>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 pull-right">
                                                            <a href="<?php echo base_url(); ?>./uploads/FreshCopy.<?= $article_data->file_name ?>" target="_blank"><button type="button" style="margin-bottom: 10px" class="btn btn-w-m btn-default pull-right">Download PDF</button></a>
                                                        </div>
                                                    </div>
                                                </div> 
                                            <?php } endforeach; ?>

                                    </div>

                                    <div id="tab-2" class="tab-pane">

                                        <?php foreach ($author_article as $article_data): ?>
                                            <?php if ($article_data->status == "published") { ?>
                                                <div class="media well">
                                                    <div class="media-body">
                                                        <a href="#" style="//margin-right: 10px" class="pull-left"><img height="132" width="92px" alt="Bootstrap Media Preview" src="http://localhost/journalProto/imgs/two.jpg" class="media-object"></a>
                                                        <div class="col-lg-8" >
                                                            <div class="ibox-content">
                                                                <h3 class="media-heading">
                                                                    <?= $article_data->title ?>
                                                                </h3> 

                                                                <span>Author :<?= $article_data->title ?> </span><br/>
                                                                <span>Sub Authors : <?= $article_data->co_authors ?> </span><br/>
                                                                <span>Keywords : <?= $article_data->keyword ?> </span><br/>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 pull-right">
                                                            <a href="<?php echo base_url(); ?>./uploads/FreshCopy.<?= $article_data->file_name ?>" target="_blank"><button type="button" style="margin-bottom: 10px" class="btn btn-w-m btn-default pull-right">Download PDF</button></a>
                                                            <a href="downloads/3282E2E55115.pdf" target="_blank"><button type="button" style="margin-bottom: 10px" class="btn btn-w-m btn-default pull-right">View in Journal</button></a>
                                                        </div>
                                                    </div>

                                                </div> 
                                            <?php }endforeach; ?>




                                    </div>
                                    <div id="tab-3" class="tab-pane">
                                        <?php foreach ($author_article as $article_data): ?>
                                            <?php if ($article_data->status == "reviewed") { ?>
                                                <div class="media well">
                                                    <div class="media-body">
                                                        <a href="#" style="//margin-right: 10px" class="pull-left"><img height="132" width="92px" alt="Bootstrap Media Preview" src="http://localhost/journalProto/imgs/two.jpg" class="media-object"></a>
                                                        <div class="col-lg-8" >
                                                            <div class="ibox-content">
                                                                <h3 class="media-heading">
                                                                    <?= $article_data->title ?>
                                                                </h3> 

                                                                <span>Author :<?= $article_data->title ?> </span><br/>
                                                                <span>Sub Authors : <?= $article_data->co_authors ?> </span><br/>
                                                                <span>Keywords : <?= $article_data->keyword ?> </span><br/>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 pull-right">
                                                            <a href="<?php echo base_url(); ?>./uploads/FreshCopy.<?= $article_data->file_name ?>" target="_blank"><button type="button" style="margin-bottom: 10px" class="btn btn-w-m btn-default pull-right">Download PDF</button></a>
                                                            <a href="" target="_blank"><button type="button" style="margin-bottom: 10px" class="btn btn-w-m btn-default pull-right">View Review</button></a>
                                                            <a href="" target="_blank"><button type="button" style="margin-bottom: 10px" class="btn btn-w-m btn-default pull-right">Submit for Camera Ready</button></a>
                                                        </div>
                                                    </div>

                                                </div> 
                                            <?php }endforeach; ?>

                                    </div>


                                    <div id="tab-4" class="tab-pane">
                                        <?php foreach ($author_article as $article_data): ?>
                                            <?php if ($article_data->status == "assigned" || $article_data->status == "pending") { ?>
                                                <div class="media well">
                                                    <div class="media-body">
                                                        <a href="#" style="//margin-right: 10px" class="pull-left"><img height="132" width="92px" alt="Bootstrap Media Preview" src="http://localhost/journalProto/imgs/two.jpg" class="media-object"></a>
                                                        <div class="col-lg-8" >
                                                            <div class="ibox-content">
                                                                <h3 class="media-heading">
                                                                    <?= $article_data->title ?>
                                                                </h3> 

                                                                <span>Author :<?= $article_data->title ?> </span><br/>
                                                                <span>Sub Authors : <?= $article_data->co_authors ?> </span><br/>
                                                                <span>Keywords : <?= $article_data->keyword ?> </span><br/>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 pull-right">
                                                            <a href="<?php echo base_url(); ?>./uploads/FreshCopy.<?= $article_data->file_name ?>" target="_blank"><button type="button" style="margin-bottom: 10px" class="btn btn-w-m btn-default pull-right">Download PDF</button></a>
                                                        </div>
                                                    </div>

                                                </div> 
                                            <?php }endforeach; ?>


                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
//                        if (isset($auther_articals)) {
//                        print_r($auther_articals);
//                        }
                        ?>

                    </div>
                </div>

            </div>



        </div>
    </div>
    <?php $this->load->view('partial/common_js'); ?>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url('assets'); ?>/js/inspinia.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/plugins/pace/pace.min.js"></script>

</body>
</html>