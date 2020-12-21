@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-body">

    <section>
        <h2 class="mb-5">{{$lead->client_name ?? ''}}</h2>
        <div class="row">
            <div class="col">
                <div class="data d-flex mb-3">
                    <strong class="mr-3">Client ID on pms:</strong>
                    <div>{{$lead->client_id_on_pms ?? ''}}</div>
                </div>

                <div class="data d-flex mb-3">
                    <strong class="mr-3">Type:</strong>
                    <div>{{$lead->type->name ?? ''}}</div>
                </div>
                <div class="data d-flex mb-3">
                    <strong class="mr-3">Product:</strong>
                    <div>{{$lead->product ?? ''}}</div>
                </div>
                <div class="data d-flex mb-3">
                    <strong class="mr-3">WWW:</strong>
                    <div>{{$lead->site_url ?? ''}}</div>
                </div>

                <div class="data d-flex mb-3">
                    <strong class="mr-3">Note:</strong>
                    <div>{{$lead->notes ?? ''}}</div>
                </div>
                <div class="data d-flex mb-3">
                    <strong class="mr-3">Priority:</strong>
                    <div>{{$lead->priority ?? ''}}</div>
                </div>

            </div>
            <div class="col">
                <div class="data d-flex mb-3">
                    <strong class="mr-3">Company:</strong>
                    <div>{{$lead->company ?? ''}}</div>
                </div>
                <div class="data d-flex mb-3">
                    <strong class="mr-3">Phone 1:</strong>
                    <div>{{$lead->phone1 ?? ''}}</div>
                </div>
                <div class="data d-flex mb-3">
                    <strong class="mr-3">Phone 2:</strong>
                    <div>{{$lead->phone2 ?? ''}}</div>
                </div>
                <div class="data d-flex mb-3">
                    <strong class="mr-3">Email:</strong>
                    <div>{{$lead->email ?? ''}}</div>
                </div>
                <div class="data d-flex mb-3">
                    <strong class="mr-3">WAY OF Communication:</strong>
                    <div>{{$lead->way_of_communication ?? ''}}</div>
                </div>
                <div class="data d-flex mb-3">
                    <strong class="mr-3">Contacted?:</strong>
                    <div>{{$lead->contracted ?? ''}}</div>
                </div>
                <div class="data d-flex mb-3">
                    <strong class="mr-3">NEXT ACTION DATE?:</strong>
                    <div>{{$lead->next_action_date ?? ''}}</div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    @if(isset($firstCall) && count($firstCall) > 0)

    <section>
        <h2 class="mb-5">First Call</h2>
        <div class="row">
            <div class="col">
                <div class="data d-flex mb-3">
                    <strong class="mr-3">CALL STATUS AFTER ASSIGN:</strong>
                    <div>{{$firstCall[0]->result->name ?? ''}}</div>
                </div>
                <div class="data d-flex mb-3">
                    <strong class="mr-3">Date Contacted:</strong>
                    <div>{{$firstCall[0]->contacted_date ?? ''}}</div>
                </div>
                <div class="data d-flex mb-3">
                    <strong class="mr-3">LEAD QUALIFICATIONS:</strong>
                    <div>{{$firstCall[0]->qualification ?? ''}}</div>
                </div>
            </div>
            <div class="col">

                <div class="data d-flex mb-3">
                    <strong class="mr-3">Call By:</strong>
                    <div>{{$firstCall[0]->call_by ?? ''}}</div>
                </div>
                <div class="data d-flex mb-3">
                    <strong class="mr-3">Next Action:</strong>
                    <div>{{$firstCall[0]->next_action ?? ''}}</div>
                </div>
                <div class="data d-flex mb-3">
                    <strong class="mr-3">NEXT ACTION DATE:</strong>
                    <div>{{$firstCall[0]->next_action_date ?? ''}}</div>
                </div>
                <div class="data d-flex mb-3">
                    <strong class="mr-3">CALL BREIF & DETAILS:</strong>
                    <div>{{$firstCall[0]->note ?? ''}}</div>
                </div>
            </div>
        </div>
    </section>
    @endif
    @if(isset($secondCall) && count($secondCall) > 0)
    <section>
        <h2 class="mb-5">Second Call</h2>
        <div class="row">
            <div class="col">
                <div class="data d-flex mb-3">
                    <strong class="mr-3">CALL STATUS AFTER ASSIGN:</strong>
                    <div>{{$secondCall[0]->result->name ?? ''}}</div>
                </div>
                <div class="data d-flex mb-3">
                    <strong class="mr-3">Date Contacted:</strong>
                    <div>{{$secondCall[0]->date ?? ''}}</div>
                </div>
                <div class="data d-flex mb-3">
                    <strong class="mr-3">LEAD QUALIFICATIONS:</strong>
                    <div>{{$secondCall[0]->qualification ?? ''}}</div>
                </div>
            </div>
            <div class="col">
                @if(isset($secondCall[0]->next_action) && $secondCall[0]->next_action != null && $secondCall[0]->next_action != '')
                <div class="data d-flex mb-3">
                    <strong class="mr-3">Next Action:</strong>
                    <div>{{$secondCall[0]->next_action ?? ''}}</div>
                </div>
                @endif
                @if(isset($secondCall[0]->next_action_date) && $secondCall[0]->next_action_date != null && $secondCall[0]->next_action_date != '')
                <div class="data d-flex mb-3">
                    <strong class="mr-3">NEXT ACTION DATE:</strong>
                    <div>{{$secondCall[0]->next_action_date ?? ''}}</div>
                </div>
                @endif

                    <div class="data d-flex mb-3">
                    <strong class="mr-3">CALL BREIF & DETAILS:</strong>
                    <div>{{$secondCall[0]->note ?? ''}}</div>
                </div>
            </div>
        </div>
    </section>
    @endif
    @if(isset($finalresult) && count($finalresult) > 0)
    <section>
        <h2 class="mb-5">Final Result</h2>
        <div class="row">
            <div class="col">
                <div class="data d-flex mb-3">
                    <strong class="mr-3">Won / Lost:</strong>
                    <div>{{$finalresult[0]->status ?? ''}}</div>
                </div>
                @if(isset($finalresult[0]->ceo_comment) && $finalresult[0]->ceo_comment != null && $finalresult[0]->ceo_comment != '')
                    <div class="data d-flex mb-3">
                        <strong class="mr-3">CEO / MANAGER COMMENTS:</strong>
                        <div>{{$finalresult[0]->ceo_comment ?? ''}}</div>
                    </div>
                @endif

            </div>
            <div class="col">
                <div class="data d-flex mb-3">
                    <strong class="mr-3">Sub-Status:</strong>
                    <div>{{$finalresult[0]->sub_status ?? ''}}</div>
                </div>

                @if(isset($finalresult[0]->note) && $finalresult[0]->note != null && $finalresult[0]->note != '')
                    <div class="data d-flex mb-3">
                        <strong class="mr-3">Management Notes & Follow up:</strong>
                        <div>{{$finalresult[0]->note ?? ''}}</div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    @endif
    </div>
 </div>
@endsection
