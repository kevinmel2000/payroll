<?php
$edit_data = $this->db->get_where('noticeboard', array('noticeboard_id' => $param2))->result_array();
foreach($edit_data as $row) { ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('edit_notice'); ?>
                </div>
            </div>
            <div class="panel-body">
                <?php echo form_open(site_url('admin/noticeboard/update/'). $param2, array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('notice_title'); ?></label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="title" required value="<?php echo $row['title']; ?>" autofocus />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('description'); ?></label>

                        <div class="col-sm-8">
                            <textarea class="form-control" name="description" rows="3" required><?php echo $row['description']; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('status'); ?></label>

                        <div class="col-sm-5">
                            <select name="status" class="form-control" required>
                                <option value="1" <?php if($row['status'] == 1) echo 'selected'; ?>>
                                    <?php echo get_phrase('active'); ?></option>
                                <option value="0" <?php if($row['status'] == 0) echo 'selected'; ?>>
                                    <?php echo get_phrase('inactive'); ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('date'); ?></label>

                        <div class="col-sm-5">
                            <input type="date" class="form-control" name="date" value="<?php echo date('Y-m-d', $row['date']); ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('update'); ?></button>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>


<?php } ?>
<script type="text/javascript">

    $( document ).ready(function() {

        // SelectBoxIt Dropdown replacement
        if($.isFunction($.fn.selectBoxIt))
        {
            $("select.selectboxit").each(function(i, el)
            {
                var $this = $(el),
                    opts = {
                        showFirstOption: attrDefault($this, 'first-option', true),
                        'native': attrDefault($this, 'native', false),
                        defaultText: attrDefault($this, 'text', ''),
                    };

                $this.addClass('visible');
                $this.selectBoxIt(opts);
            });
        }

    });

</script>
