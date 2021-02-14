<div class="tab-pane active show proposal" id="v-pills-proposal" role="tabpanel"
aria-labelledby="v-pills-details-tab">
<div class="card  card-custom">
   <h5 class="card-header " style="text-align: left">  
      
         
               @trans('settings.settings.tickets_settings')
              
        
      
   </h5>
   <div class="card-body">


    <form action="{{ route('admin.tickets.settings.store') }}" method="POST" >
        @csrf
        <section class="panel panel-custom">
            <header class="panel-heading  "><?= trans('settings.tickets_settings') ?></header>
            <div class="panel-body">

                <div class="form-group">
                    <label class="col-lg-3 control-label"><?= trans('settings.default_department') ?></label>
                    <div class="col-lg-5">
                        <select name="default_department" style="width: 100%" class="form-control select_box">
                 
                            @forelse($departments as $department)
                                    <option
                                        value="{{ $department->id }}" @if(old('default_department',settings('default_department')) == $department->id) {{ 'selected' }} @endif  > {{ $department->department_name }}  </option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                </div>
                
                <div class="form-group">

                    <label class="col-lg-3 control-label"><?= trans('settings.default_status') ?></label>
                    <div class="col-lg-5">
                        <select name="default_status" class="form-control">


                            @forelse($status as $statue)

                            <option
                            value="{{ $statue->status_en }}" @if( old('default_status',settings('default_status')) == $statue->status_en)  {{ 'selected' }}  @endif >{{ app()->getLocale() == 'en' ? $statue->status_en : $statue->status_ar }}</option>
                            @empty

                            @endforelse
                          
                           
                        </select>
                    </div>
                </div>
                <div class="form-group">

                    <label class="col-lg-3 control-label"><?= trans('settings.default_priority') ?></label>
                    <div class="col-lg-5">
     

                    <select name="default_priority" class="form-control">


                        @forelse($priorities as $priority)

                        <option
                        value="{{ $priority->priority_en }}" @if( old('default_priority',settings('default_priority')) == $priority->priority_en)  {{ 'selected' }}  @endif >{{ app()->getLocale() == 'en' ? $priority->priority_en : $priority->priority_ar }}</option>
                        @empty

                        @endforelse
                    
                    
                    </select>
                    </div>
                    <div class="col-lg-2">
                        <a data-toggle="modal" data-target="#myModal"
                           href="<?= base_url() ?>admin/settings/manage_status/priority"
                           class=""><?= trans('settings.new') . ' ' . trans('settings.priority') ?></a>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label"><?= trans('settings.notify_ticket_reopened') ?></label>
                    <div class="col-lg-6">
                        <div class="checkbox c-checkbox">
                            <label class="needsclick">
                                <input type="checkbox" <?php
                                if (settings('notify_ticket_reopened') == 'TRUE') {
                                    echo "checked=\"checked\"";
                                }
                                ?> name="notify_ticket_reopened">
                                <span class="fa fa-check"></span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <header class="panel-heading  "><?= trans('settings.leads_settings') ?></header>
                    <div class="panel-body">
                        <div class="form-group">
                            <label
                                class="col-lg-3 control-label"><?= trans('settings.default') . ' ' . trans('settings.source') ?></label>
                            <div class="col-lg-5">
                                <select name="default_leads_source" style="width: 100%"
                                        class="form-control select_box">
                                    <?php
                                    $all_lead_source = $this->db->get('tbl_lead_source')->result();
                                    if (!empty($all_lead_source)) {
                                        foreach ($all_lead_source as $lead_source) {
                                            ?>
                                            <option
                                                value="<?= $lead_source->lead_source_id ?>"<?= (settings('default_leads_source') == $lead_source->lead_source_id ? ' selected="selected"' : '') ?>><?= $lead_source->lead_source ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <a href="<?= base_url() ?>admin/settings/lead_source"
                                   class=""><?= trans('settings.new') . ' ' . trans('settings.source') ?></a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label
                                class="col-lg-3 control-label"><?= trans('settings.default') . ' ' . trans('settings.status') ?></label>
                            <div class="col-lg-5">
                                <select name="default_lead_status" style="width: 100%"
                                        class="form-control select_box">
                                    <?php
                                    $all_lead_status = $this->db->get('tbl_lead_status')->result();

                                    if (!empty($all_lead_status)) {
                                        foreach ($all_lead_status as $lead_status) {
                                            ?>
                                            <option
                                                value="<?= $lead_status->lead_status_id ?>"<?= (settings('default_lead_status') == $lead_status->lead_status_id ? ' selected="selected"' : '') ?>><?= $lead_status->lead_status . ' (' . trans($settings.lead_status->lead_type) . ' )' ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <a href="<?= base_url() ?>admin/settings/lead_status"
                                   class=""><?= trans('settings.new') . ' ' . trans('settings.status') ?></a>
                            </div>
                        </div>
                        <?php $lead_permission = settings('default_lead_permission'); ?>
                        <div class="form-group">
                            <label class="col-lg-3 control-label"><?= trans('settings.permission_for_new_leads') ?></label>
                            <div class="col-sm-9">
                                <div class="checkbox c-radio needsclick">
                                    <label class="needsclick">
                                        <input id="" <?php
                                        if (isset($lead_permission) && $lead_permission == 'all') {
                                            echo 'checked';
                                        }
                                        ?> type="radio" name="default_lead_permission" value="everyone">
                                        <span class="fa fa-circle"></span><?= trans('settings.everyone') ?>
                                        <i title="<?= trans('settings.permission_for_all') ?>"
                                           class="fa fa-question-circle" data-toggle="tooltip"
                                           data-placement="top"></i>
                                    </label>
                                </div>
                                <div class="checkbox c-radio needsclick">
                                    <label class="needsclick">
                                        <input id="" <?php
                                        if (isset($lead_permission) && $lead_permission != 'all') {
                                            echo 'checked';
                                        }
                                        ?> type="radio" name="default_lead_permission" value="custom_permission"
                                        >
                                        <span class="fa fa-circle"></span><?= trans('settings.custom_permission') ?> <i
                                            title="<?= trans('settings.permission_for_customization') ?>"
                                            class="fa fa-question-circle" data-toggle="tooltip"
                                            data-placement="top"></i>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group <?php
                        if (!empty($lead_permission) && $lead_permission != 'all') {
                            echo 'show';
                        }
                        ?>" id="permission_user_1">
                            <label for="field-1"
                                   class="col-sm-3 control-label"><?= trans('settings.select') . ' ' . trans('settings.users') ?>
                                <span
                                    class="required">*</span></label>
                            <div class="col-sm-9">
                                <?php
                                if (!empty($assign_user)) {
                                    foreach ($assign_user as $key => $v_user) {

                                        if ($v_user->role_id == 1) {
                                            $disable = true;
                                            $role = '<strong class="badge btn-danger">' . trans('settings.admin') . '</strong>';
                                        } else {
                                            $disable = false;
                                            $role = '<strong class="badge btn-primary">' . trans('settings.staff') . '</strong>';
                                        }

                                        ?>
                                        <div class="checkbox c-checkbox needsclick">
                                            <label class="needsclick">
                                                <input type="checkbox"
                                                    <?php
                                                    if (!empty($lead_permission) && $lead_permission != 'all') {
                                                        $get_permission = json_decode(settings('default_lead_permission'));
                                                        foreach ($get_permission as $user_id => $v_permission) {
                                                            if ($user_id == $v_user->user_id) {
                                                                echo 'checked';
                                                            }
                                                        }

                                                    }
                                                    ?>
                                                       value="<?= $v_user->user_id ?>"
                                                       name="assigned_to[]"
                                                       class="needsclick">
                                                    <span
                                                        class="fa fa-check"></span><?= $v_user->username . ' ' . $role ?>
                                            </label>

                                        </div>
                                        <div class="action_1 p
                                            <?php

                                        if (!empty($lead_permission) && $lead_permission != 'all') {
                                            $get_permission = json_decode(settings('default_lead_permission'));

                                            foreach ($get_permission as $user_id => $v_permission) {
                                                if ($user_id == $v_user->user_id) {
                                                    echo 'show';
                                                }
                                            }

                                        }
                                        ?>
                                            " id="action_1<?= $v_user->user_id ?>">
                                            <label class="checkbox-inline c-checkbox">
                                                <input id="<?= $v_user->user_id ?>" checked type="checkbox"
                                                       name="action_1<?= $v_user->user_id ?>[]"
                                                       disabled
                                                       value="view">
                                                    <span
                                                        class="fa fa-check"></span><?= trans('settings.can') . ' ' . trans('settings.view') ?>
                                            </label>
                                            <label class="checkbox-inline c-checkbox">
                                                <input <?php if (!empty($disable)) {
                                                    echo 'disabled' . ' ' . 'checked';
                                                } ?> id="<?= $v_user->user_id ?>"
                                                    <?php

                                                    if (!empty($lead_permission) && $lead_permission != 'all') {
                                                        $get_permission = json_decode(settings('default_lead_permission'));

                                                        foreach ($get_permission as $user_id => $v_permission) {
                                                            if ($user_id == $v_user->user_id) {
                                                                if (in_array('edit', $v_permission)) {
                                                                    echo 'checked';
                                                                };

                                                            }
                                                        }

                                                    }
                                                    ?>
                                                     type="checkbox"
                                                     value="edit" name="action_<?= $v_user->user_id ?>[]">
                                                    <span
                                                        class="fa fa-check"></span><?= trans('settings.can') . ' ' . trans('settings.edit') ?>
                                            </label>
                                            <label class="checkbox-inline c-checkbox">
                                                <input <?php if (!empty($disable)) {
                                                    echo 'disabled' . ' ' . 'checked';
                                                } ?> id="<?= $v_user->user_id ?>"
                                                    <?php

                                                    if (!empty($lead_permission) && $lead_permission != 'all') {
                                                        $get_permission = json_decode(settings('default_lead_permission'));
                                                        foreach ($get_permission as $user_id => $v_permission) {
                                                            if ($user_id == $v_user->user_id) {
                                                                if (in_array('delete', $v_permission)) {
                                                                    echo 'checked';
                                                                };
                                                            }
                                                        }

                                                    }
                                                    ?>
                                                     name="action_<?= $v_user->user_id ?>[]"
                                                     type="checkbox"
                                                     value="delete">
                                                    <span
                                                        class="fa fa-check"></span><?= trans('settings.can') . ' ' . trans('settings.delete') ?>
                                            </label>
                                            <input id="<?= $v_user->user_id ?>" type="hidden"
                                                   name="action_<?= $v_user->user_id ?>[]" value="view">

                                        </div>


                                        <?php
                                    }
                                }
                                ?>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label"></label>
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-sm btn-primary"><?= trans('settings.save_changes') ?></button>
                    </div>
                </div>
        </section>
                </form>
      
    </div>
</div>
</div>

