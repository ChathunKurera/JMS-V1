<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php $this->load->view('partial/header'); ?>
<!-- Data Tables -->
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">


</head>
<body>
<div id="wrapper">
    <?php $this->load->view('partial/reviewer_navigation'); ?>

    <div id="page-wrapper" class="gray-bg">

        <div class="row border-bottom">
            <?php $this->load->view('partial/top_bar'); ?>
        </div>

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2><span class="fa fa-user"></span> Review Dashboard</h2>
                <ol class="breadcrumb">
                    <li>
                        Reviewer
                    </li>
                    <li class="active">
                        <strong>Review Dashboard</strong>
                    </li>
                </ol>
            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">
                    <?php
                    if (isset($flash_message)):
                        ?>
                        <center>
                            <div class="alert alert-success alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <?= $flash_message ?>.
                            </div>
                        </center>
                    <?php
                    endif
                    ?>
                    <div class="ibox-content">

                        <div class="panel-heading">
                            <!--<div class="panel-title m-b-md"><h4>Blank Panel with text tabs</h4></div>-->
                            <div class="panel-options">

                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#pending">Pending Reviews</a></li>
                                    <li class=""><a data-toggle="tab" href="#reviewed">Reviewed</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="pending" class="tab-pane active">
                                     
                                    <?php
                                    foreach ($pending_articles as $article):
                                        $due_date = date('Y-m-d', strtotime($article->assigned_date . " + $reviewing_time days"));
                                        $difference = floor((strtotime($due_date) - time()) / (60 * 60 * 24));
                                        $class = "font-bold ";
                                        if ($difference > 14) {
                                            $class .= "text-primary";
                                        } elseif ($difference > 7) {
                                            $class .= "text-warning";
                                        } else {
                                            $class .= "text-danger";
                                        }
                                        ?>

                                        <div class="media well">
                                            <div class="media-body">
                                                <div class="col-md-10">

                                                    <h3 class="media-heading">
                                                        <?= $article->title ?>
                                                    </h3>

                                                    <span data-journal-id="<?= $article->journal_id ?>"
                                                          class="journal_info">Journal:<?= $article->name ?></span><br/>
                                                    <span>Keywords: <?php
                                                        $string = "";
                                                        foreach ($article->keywords as $keyword) {
                                                            $string .= $keyword->keyword . ", ";
                                                        }
                                                        echo $string = substr($string, 0, -2);
                                                        ?></span><br/>
                                                    <span>Assigned on: <?= $article->assigned_date ?></span><br/>
                                                    <span class="<?= $class ?>">Due on: <?= $due_date; ?>
                                                        ( <?= $difference ?> Days Remaining)</span>
                                                </div>
                                                <div class="col-md-2">
                                                    <a href="<?= base_url('index.php/Download/blindcopy/' . $article->id) ?>"
                                                       target="_blank">
                                                        <button style="width: 100%" class="btn btn-primary"><span
                                                                class="glyphicon glyphicon-download"></span>
                                                            Download
                                                        </button>
                                                    </a>
                                                    <a href="<?= site_url('articles/review/' . $article->id) ?>">
                                                        <button style="margin-top: 5px;width: 100%"
                                                                class="btn btn-info">
                                                            <span class="glyphicon glyphicon-plus-sign"></span> Review
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    <?php

                                    endforeach;

                                    ?> 
                                </div>
                                <div id="reviewed" class="tab-pane">

                                    <?php
                                    foreach ($reviewed_articles as $article):
                                        ?>


                                        <div class="media well">
                                            <div class="media-body">
                                                <div class="col-md-10">

                                                    <h3 class="media-heading">
                                                        <?= $article->title ?>
                                                    </h3>

                                                    <span data-journal-id="<?= $article->journal_id ?>"
                                                          class="journal_info">Journal:<?= $article->name ?></span><br/>
                                                    <span>Keywords: <?php
                                                        $string = "";
                                                        foreach ($article->keywords as $keyword) {
                                                            $string .= $keyword->keyword . ", ";
                                                        }
                                                        echo $string = substr($string, 0, -2);
                                                        ?></span><br/>
                                                    <span>Assigned on: <?= $article->assigned_date ?></span><br/>
                                                    <span>Reviewed on: <?= $article->review_date ?></span>
                                                </div>
                                                <div class="col-md-2">
                                                    <a href="<?= base_url('index.php/Download/blindcopy/' . $article->id) ?>"
                                                       target="_blank">
                                                        <button style="width: 100%" class="btn btn-primary"><span
                                                                class="glyphicon glyphicon-download"></span>
                                                            Download
                                                        </button>
                                                    </a>
                                                    <button style="margin-top: 5px;width: 100%"
                                                            class="btn btn-info">
                                                        <span class="glyphicon glyphicon-eye-open"></span> View
                                                        Review
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    <?php

                                    endforeach;

                                    ?>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal inmodal" id="modelJournal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-book modal-icon"></i>
                <h4 class="modal-title" id="journal-name-large"></h4>
                <small id="journal-modal-title-small"></small>
            </div>
            <form>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="name">Name </label>
                                <input id="journal-name" type="text" class="form-control disabled" name="name"
                                       disabled/>
                            </div>
                            <div class="form-group">
                                <label for="journal-scope">Scope </label>
                                <input type="text" name="scope" id="journal-scope" class="form-control disabled"
                                       disabled/>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="journal-chief-editor">Chief Editor </label>
                                <input name="journal-chief-editor" id="journal-chief-editor" disabled type="text"
                                       class="form-control disabled"/>
                            </div>

                            <div class="form-group">
                                <label for="journal-category">Category </label>
                                <input name="journal-category" id="journal-category" disabled type="text"
                                       class="form-control disabled"
                                    />
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('partial/common_js'); ?>

<!-- Custom and plugin javascript -->
<script src="<?php echo base_url('assets'); ?>/js/inspinia.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/plugins/pace/pace.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $(".journal_info").click(function () {
            var journal_id = $(this).data('journal-id');

            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "<?php echo base_url('/index.php/API/get_journal'); ?>/" + journal_id,
                success: function (data) {
                    $('#journal-name-large').text(data.name);
                    $('#journal-modal-title-small').text("Volume: " + data.volume + " Issue: " + data.issue);

                    $('#journal-name').val(data.name);
                    $('#journal-scope').val(data.scope);
                    $('#journal-chief-editor').val(data.first_name + " " + data.last_name);
                    $('#journal-category').val(data.category);
                    $('#modelJournal').modal('show');
                },
                error : function(){
                    alert("Error occurred. Please check your internet connection or contact Administrator")
                }
            });
        });
    });
</script>

</body>
</html>