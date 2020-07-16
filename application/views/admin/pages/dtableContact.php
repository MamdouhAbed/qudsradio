

<div class="robust-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/index">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active">قائمة الطلبات والاستفسارات
                    </li>
                </ol>
            </div>

            <div class="content-header-lead col-xs-12 mt-1">

            </div>
        </div>
        <div class="content-body">
            <!-- Responsive integration table -->
            <section id="responsive">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><i class="icon-tag"></i> قائمة الطلبات والاستفسارات</h4>
                                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                        <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                        <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body collapse in">
                                <div class="card-block card-dashboard">

                                    <table class="table table-striped table-bordered dataex-fixh-responsive">
                                        <thead>
                                        <th>رقم الطلب</th>
                                        <th>الاسم</th>
                                        <th>البريد الالكتروني</th>
                                        <th>جوال</th>
                                        <th>الموضوع</th>
                                        <th>نص الرسالة</th>
                                        <th>تاريخ ووقت الاضافة</th>

                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($Contact as $contact)
                                        {?>
                                            <tr>
                                                <td><?php  echo $contact->id ?></td>
                                                <td><?php  echo $contact->name ?></td>
                                                <td><?php  echo $contact->email ?></td>
                                                <td><?php  echo $contact->mobile ?></td>
                                                <td><?php  echo $contact->subject ?></td>
                                                <td><?php  echo $contact->text ?></td>

                                                <td><?php echo ArabicDate($contact->created_at); ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>رقم الطلب</th>
                                            <th>الاسم</th>
                                            <th>البريد الالكتروني</th>
                                            <th>جوال</th>
                                            <th>الموضوع</th>
                                            <th>نص الرسالة</th>
                                            <th>تاريخ ووقت الاضافة</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Responsive integration table -->
        </div>

    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->





