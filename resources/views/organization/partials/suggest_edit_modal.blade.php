<!-- Suggest Edit Modal -->
<div class="modal fade" id="suggestEditModal" tabindex="-1" role="dialog" aria-labelledby="suggestEditModalTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header suggest-edit-modal-header">
                <div class="row">
                    <div class="col-10">
                        <h5 class="modal-title" id="exampleModalLongTitle">{{ $organization->organization_name }}</h5>
                    </div>
                    <div class="col-2">
                        <button type="button" class="close suggest-edit-close-button" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>

                <p class="la la-map-marker mr-2 pt-2 suggest-edit-modal-address">
                    @if($organization->organization_address)
                        {{ $organization->organization_address }}
                    @else
                        {{ ucfirst($organization->city->name) }}, Nebraska, US
                    @endif
                </p>
                <p class="la la-phone mr-2 pt-2 suggest-edit-modal-address">
                    {{ $organization->organization_phone_number }}
                </p>
            </div>
            <form method="post" action="{{ route('store.suggest.edit',$organization->slug ) }}"
                  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="suggested-modal-content-section">
                        <div class="form-group row">
                            <div class="col-sm-3 suggested-modal-content-text">Is It Closed?</div>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input suggest-edit-form-check-input" type="checkbox"
                                           name="is_it_closed"
                                           id="is_it_closed" value="1">
                                    <label class="form-check-label suggested-modal-content-text" for="is_it_closed">
                                        Yes, this business is permanently closed
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 suggested-modal-content-text">Temporarily closed?</div>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input suggest-edit-form-check-input" type="checkbox"
                                           name="temporarily_closed"
                                           id="temporarily_closed" value="1">
                                    <label class="form-check-label suggested-modal-content-text"
                                           for="temporarily_closed">
                                        Yes, this business is temporarily closed
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 suggested-modal-content-text">Are you the owner?</div>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input suggest-edit-form-check-input" type="checkbox"
                                           name="are_you_the_owner"
                                           id="are_you_the_owner" value="1">
                                    <label class="form-check-label suggested-modal-content-text"
                                           for="are_you_the_owner">
                                        I'm the owner (manager) of the business
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 suggested-modal-content-text">Business Name</div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="organization_name" id="organization_name"
                                       value="{{ $organization->organization_name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 suggested-modal-content-text">Address</div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="organization_address"
                                       id="organization_address" value="{{ $organization->organization_address }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 suggested-modal-content-text">Phone</div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="organization_phone_number"
                                       id="organization_phone_number"
                                       value="{{ $organization->organization_phone_number }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 suggested-modal-content-text">Website Url</div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="organization_website"
                                       id="organization_website" value="{{ $organization->organization_website }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 suggested-modal-content-text">Price list Url</div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="price_list_url" id="price_list_url">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 suggested-modal-content-text">Hours of Operation:</div>
                            <div class="col-sm-9">

                                <div class="form-box table-responsive">
                                    <table class="table time-list mb-0">
                                        <thead>
                                        <tr>
                                            <th class="w-50">Days</th>
                                            <th>Open</th>
                                            <th>Close</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($organization->organization_work_time)
                                            <tr class="business-opening-wrap">
                                                <td class="business-day">{{ $first_day }}</td>
                                                <td class="user-chosen-select-container">
                                                    <select class="user-chosen-select" name="first_day_open"
                                                            id="first_day_open">
                                                        @foreach($select_hours as $hours)
                                                            <option
                                                                value="{{ $hours }}" {{ str_replace(' ', ' ', $hours) == $first_day_opening_hours ? 'selected' : '' }}>
                                                                {{ $hours }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="user-chosen-select-container">
                                                    <select class="user-chosen-select" name="first_day_close"
                                                            id="first_day_close">
                                                        @foreach($select_hours as $hours)
                                                            <option
                                                                value="{{$hours}}" {{ str_replace(' ', ' ', $hours) == $first_day_closing_hours ? 'selected' : '' }}>{{$hours}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr class="business-opening-wrap">
                                                <td class="business-day">{{ $second_day }}</td>
                                                <td class="user-chosen-select-container">
                                                    <select class="user-chosen-select" name="second_day_open"
                                                            id="second_day_open">
                                                        @foreach($select_hours as $hours)
                                                            <option
                                                                value="{{$hours}}" {{ str_replace(' ', ' ', $hours) == $second_day_opening_hours ? 'selected' : '' }}>{{$hours}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="user-chosen-select-container">
                                                    <select class="user-chosen-select" name="second_day_close"
                                                            id="second_day_close">
                                                        @foreach($select_hours as $hours)
                                                            <option
                                                                value="{{$hours}}" {{ str_replace(' ', ' ', $hours) == $second_day_closing_hours ? 'selected' : '' }}>{{$hours}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr class="business-opening-wrap">
                                                <td class="business-day">{{ $third_day }}</td>
                                                <td class="user-chosen-select-container">
                                                    <select class="user-chosen-select" name="third_day_open"
                                                            id="third_day_open">
                                                        @foreach($select_hours as $hours)
                                                            <option
                                                                value="{{$hours}}" {{ str_replace(' ', ' ', $hours) == $third_day_opening_hours ? 'selected' : '' }}>{{$hours}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="user-chosen-select-container">
                                                    <select class="user-chosen-select" name="third_day_close"
                                                            id="third_day_close">
                                                        @foreach($select_hours as $hours)
                                                            <option
                                                                value="{{$hours}}" {{ str_replace(' ', ' ', $hours) == $third_day_closing_hours ? 'selected' : '' }}>{{$hours}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr class="business-opening-wrap">
                                                <td class="business-day">{{ $fourth_day }}</td>
                                                <td class="user-chosen-select-container">
                                                    <select class="user-chosen-select" name="fourth_day_open"
                                                            id="fourth_day_open">
                                                        @foreach($select_hours as $hours)
                                                            <option
                                                                value="{{ $hours }}" {{ str_replace(' ', ' ', $hours) == $fourth_day_opening_hours ? 'selected' : '' }}>
                                                                {{ $hours }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="user-chosen-select-container">
                                                    <select class="user-chosen-select" name="fourth_day_close"
                                                            id="fourth_day_close">
                                                        @foreach($select_hours as $hours)
                                                            <option
                                                                value="{{$hours}}" {{ str_replace(' ', ' ', $hours) == $fourth_day_closing_hours ? 'selected' : '' }}>{{$hours}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr class="business-opening-wrap">
                                                <td class="business-day">{{ $fifth_day }}</td>
                                                <td class="user-chosen-select-container">
                                                    <select class="user-chosen-select" name="fifth_day_open"
                                                            id="fifth_day_open">
                                                        @foreach($select_hours as $hours)
                                                            <option
                                                                value="{{ $hours }}" {{ str_replace(' ', ' ', $hours) == $fifth_day_opening_hours ? 'selected' : '' }}>
                                                                {{ $hours }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="user-chosen-select-container">
                                                    <select class="user-chosen-select" name="fifth_day_close"
                                                            id="fifth_day_close">
                                                        @foreach($select_hours as $hours)
                                                            <option
                                                                value="{{$hours}}" {{ str_replace(' ', ' ', $hours) == $fifth_day_closing_hours ? 'selected' : '' }}>{{$hours}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr class="business-opening-wrap">
                                                <td class="business-day">{{ $sixth_day }}</td>
                                                <td class="user-chosen-select-container">
                                                    <select class="user-chosen-select" name="sixth_day_open"
                                                            id="sixth_day_open">
                                                        @foreach($select_hours as $hours)
                                                            <option
                                                                value="{{ $hours }}" {{ str_replace(' ', ' ', $hours) == $sixth_day_opening_hours ? 'selected' : '' }}>
                                                                {{ $hours }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="user-chosen-select-container">
                                                    <select class="user-chosen-select" name="sixth_day_close"
                                                            id="sixth_day_close">
                                                        @foreach($select_hours as $hours)
                                                            <option
                                                                value="{{$hours}}" {{ str_replace(' ', ' ', $hours) == $sixth_day_closing_hours ? 'selected' : '' }}>{{$hours}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr class="business-opening-wrap">
                                                <td class="business-day">{{ $seventh_day }}</td>
                                                <td class="user-chosen-select-container">
                                                    <select class="user-chosen-select" name="seventh_day_open"
                                                            id="seventh_day_open">
                                                        @foreach($select_hours as $hours)
                                                            <option
                                                                value="{{ $hours }}" {{ str_replace(' ', ' ', $hours) == $seventh_day_opening_hours ? 'selected' : '' }}>
                                                                {{ $hours }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="user-chosen-select-container">
                                                    <select class="user-chosen-select" name="seventh_day_close"
                                                            id="seventh_day_close">
                                                        @foreach($select_hours as $hours)
                                                            <option
                                                                value="{{$hours}}" {{ str_replace(' ', ' ', $hours) == $seventh_day_closing_hours ? 'selected' : '' }}>{{$hours}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                        @else
                                            <tr class="business-opening-wrap">
                                                <td class="business-day">Monday</td>
                                                <td class="user-chosen-select-container">
                                                    <select class="user-chosen-select" name="monday_open"
                                                            id="monday_open">
                                                        @foreach($select_hours as $hours)
                                                            <option value="{{ $hours }}">
                                                                {{ $hours }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="user-chosen-select-container">
                                                    <select class="user-chosen-select" name="monday_close"
                                                            id="monday_close">
                                                        @foreach($select_hours as $hours)
                                                            <option value="{{$hours}}">{{$hours}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr class="business-opening-wrap">
                                                <td class="business-day">Tuesday</td>
                                                <td class="user-chosen-select-container">
                                                    <select class="user-chosen-select" name="tuesday_open"
                                                            id="tuesday_open">
                                                        @foreach($select_hours as $hours)
                                                            <option value="{{$hours}}">{{$hours}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="user-chosen-select-container">
                                                    <select class="user-chosen-select" name="tuesday_close"
                                                            id="tuesday_close">
                                                        @foreach($select_hours as $hours)
                                                            <option value="{{$hours}}">{{$hours}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr class="business-opening-wrap">
                                                <td class="business-day">Wednesday</td>
                                                <td class="user-chosen-select-container">
                                                    <select class="user-chosen-select" name="wednesday_open"
                                                            id="wednesday_open">
                                                        @foreach($select_hours as $hours)
                                                            <option value="{{$hours}}">{{$hours}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="user-chosen-select-container">
                                                    <select class="user-chosen-select" name="wednesday_close"
                                                            id="wednesday_close">
                                                        @foreach($select_hours as $hours)
                                                            <option value="{{$hours}}">{{$hours}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr class="business-opening-wrap">
                                                <td class="business-day">Thursday</td>
                                                <td class="user-chosen-select-container">
                                                    <select class="user-chosen-select" name="thursday_open"
                                                            id="thursday_open">
                                                        @foreach($select_hours as $hours)
                                                            <option value="{{ $hours }}">{{ $hours }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="user-chosen-select-container">
                                                    <select class="user-chosen-select" name="thursday_close"
                                                            id="thursday_close">
                                                        @foreach($select_hours as $hours)
                                                            <option
                                                                value="{{$hours}}">{{$hours}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr class="business-opening-wrap">
                                                <td class="business-day">Friday</td>
                                                <td class="user-chosen-select-container">
                                                    <select class="user-chosen-select" name="friday_open"
                                                            id="friday_open">
                                                        @foreach($select_hours as $hours)
                                                            <option value="{{ $hours }}">{{ $hours }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="user-chosen-select-container">
                                                    <select class="user-chosen-select" name="friday_close"
                                                            id="friday_close">
                                                        @foreach($select_hours as $hours)
                                                            <option
                                                                value="{{$hours}}">{{$hours}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr class="business-opening-wrap">
                                                <td class="business-day">Saturday</td>
                                                <td class="user-chosen-select-container">
                                                    <select class="user-chosen-select" name="saturday_open"
                                                            id="saturday_open">
                                                        @foreach($select_hours as $hours)
                                                            <option value="{{ $hours }}">{{ $hours }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="user-chosen-select-container">
                                                    <select class="user-chosen-select" name="saturday_close"
                                                            id="saturday_close">
                                                        @foreach($select_hours as $hours)
                                                            <option value="{{$hours}}">{{$hours}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr class="business-opening-wrap">
                                                <td class="business-day">Sunday</td>
                                                <td class="user-chosen-select-container">
                                                    <select class="user-chosen-select" name="sunday_open"
                                                            id="sunday_open">
                                                        @foreach($select_hours as $hours)
                                                            <option value="{{ $hours }}">{{ $hours }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="user-chosen-select-container">
                                                    <select class="user-chosen-select" name="sunday_close"
                                                            id="sunday_close">
                                                        @foreach($select_hours as $hours)
                                                            <option
                                                                value="{{$hours}}">{{$hours}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 suggested-modal-content-text">Your Message</div>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="message" id="message"
                                          rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Suggest Edit Modal -->

<!-- Get Your Award Modal -->
<div class="modal fade" id="getYourAwardModal" tabindex="-1" role="dialog" aria-labelledby="getYourAwardModalTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header suggest-edit-modal-header">
                <div class="row">
                    <div class="col-10">
                        <h5 class="modal-title" id="exampleModalLongTitle">{{ $organization->organization_name }}</h5>
                    </div>
                    <div class="col-2">
                        <button type="button" class="close suggest-edit-close-button" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>

                <p class="la la-map-marker mr-2 pt-2 suggest-edit-modal-address">
                    @if($organization->organization_address)
                        {{ $organization->organization_address }}
                    @else
                        {{ ucfirst($organization->city->name) }}, Nebraska, US
                    @endif
                </p>
                <p class="la la-phone mr-2 pt-2 suggest-edit-modal-address">
                    {{ $organization->organization_phone_number }}
                </p>
            </div>
            <form method="post" action="{{ route('get.award.certificate', $organization->slug) }}"
                  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="suggested-modal-content-section">
                        <div class="form-group row">
                            <div class="col-sm-5 suggested-modal-content-text">Are you affiliated
                                with {{ $organization->organization_name }} ?
                            </div>
                            <div class="col-sm-7">
                                <div class="form-check">
                                    <input class="form-check-input suggest-edit-form-check-input" type="checkbox"
                                           name="is_affiliated"
                                           id="is_affiliated" value="1">
                                    <label class="form-check-label suggested-modal-content-text"
                                           for="is_affiliated">
                                        Yes
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-5 suggested-modal-content-text">Name <span class="required">*</span>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="requested_user_name"
                                       id="requested_user_name" value="{{ old('requested_user_name') }}"
                                       placeholder="Name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-5 suggested-modal-content-text">Your Email <span
                                    class="required">*</span></div>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" name="requested_user_email"
                                       id="requested_user_email"
                                       value="{{ old('requested_user_email') }}" placeholder="Your Email" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Get Your Award Modal -->
