<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GlobalSearchController extends Controller
{
    private $models = [
        'User'           => 'cruds.user.title',
        'Employee'       => 'cruds.employee.title',
        'TimeWorkType'   => 'cruds.timeWorkType.title',
        'Department'     => 'cruds.department.title',
        'Designation'    => 'cruds.designation.title',
        'AccountDetail'  => 'cruds.accountDetail.title',
        'Holiday'        => 'cruds.holiday.title',
        'Training'       => 'cruds.training.title',
        'LeaveCategory'  => 'cruds.leaveCategory.title',
        'LeaveApplication'  => 'cruds.leaveApplication.title',
        'MeetingMinute'  => 'cruds.meetingMinute.title',
        'EmployeeAward'  => 'cruds.employeeAward.title',
        'JobCircular'    => 'cruds.jobCircular.title',
        'JobApplication' => 'cruds.jobApplication.title',
        'Lead'           => 'cruds.lead.title',
        'Opportunity'    => 'cruds.opportunity.title',
        'Client'         => 'cruds.client.title',
        'ClientMenu'     => 'cruds.clientMenu.title',
        'Project'        => 'cruds.project.title',
        'Account'         => 'cruds.account.title',
        'Bug'            => 'cruds.bug.title',
        'Announcement'   => 'cruds.announcement.title',
        'EmployeeBank'   => 'cruds.employeeBank.title',
    ];


    private $modelsPath = [
        'User'           => 'App\\Models\\',
        'Employee'       => 'Modules\\HR\\Entities\\',
        'TimeWorkType'   => 'App\\Models\\',
        'Department'     => 'Modules\\HR\\Entities\\',
        'Designation'    => 'Modules\\HR\\Entities\\',
        'AccountDetail'  => 'Modules\\HR\\Entities\\',
        'Holiday'        => 'Modules\\HR\\Entities\\',
        'Training'       => 'Modules\\HR\\Entities\\',
        'LeaveCategory'  => 'Modules\\HR\\Entities\\',
        'LeaveApplication'  => 'Modules\\HR\\Entities\\',
        'MeetingMinute'  => 'Modules\\HR\\Entities\\',
        'EmployeeAward'  => 'Modules\\HR\\Entities\\',
        'JobCircular'    => 'Modules\\HR\\Entities\\',
        'JobApplication' => 'Modules\\HR\\Entities\\',
        'Lead'           => 'App\\Models\\',
        'Opportunity'    => 'App\\Models\\',
        'Client'         => 'App\\Models\\',
        'ClientMenu'     => 'App\\Models\\',
        'Project'        => 'App\\Models\\',
        'Account'        => 'App\\Models\\',
        'Bug'            => 'App\\Models\\',
        'Announcement'   => 'App\\Models\\',
        'EmployeeBank'   => 'Modules\\HR\\Entities\\',
    ];

    public function search(Request $request)
    {
        $search = $request->input('search');

        if ($search === null || !isset($search['term'])) {
            abort(400);
        }

        $term           = $search['term'];
        $searchableData = [];

        foreach ($this->models as $model => $translation) {
            // $modelClass = 'App\\Models\\' . $model;
            foreach ($this->modelsPath as $key => $value) {
                if(($key == $model)){
                    $path = $value;
                }
            }
            // dd(($path));
            $modelClass = $path . $model;
            $query      = $modelClass::query();

            $fields = $modelClass::$searchable;

            foreach ($fields as $field) {
                $query->orWhere($field, 'LIKE', '%' . $term . '%');
            }

            $results = $query->take(10)
                ->get();

            foreach ($results as $result) {
                $parsedData           = $result->only($fields);
                $parsedData['model']  = trans($translation);
                $parsedData['fields'] = $fields;
                $formattedFields      = [];

                foreach ($fields as $field) {
                    $formattedFields[$field] = Str::title(str_replace('_', ' ', $field));
                }

                $parsedData['fields_formated'] = $formattedFields;

                // $parsedData['url'] = url('/admin/' . Str::plural(Str::snake($model, '-')) . '/' . $result->id . '/edit');
                $parsedData['url'] = url('/admin/' . Str::plural(Str::snake($model, '-')) );
                $parsedData['url'] = ($path == 'Modules\\HR\\Entities\\') ? url('/admin/hr/' . Str::plural(Str::snake($model, '-')) ) : url('/admin/' . Str::plural(Str::snake($model, '-')) );
                // dd($parsedData['url']);
                $searchableData[] = $parsedData;
            }
        }

        return response()->json(['results' => $searchableData]);
    }
}
