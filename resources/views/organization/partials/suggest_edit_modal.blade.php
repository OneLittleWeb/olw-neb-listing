<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
            <div class="modal-body">
                <div class="suggested-modal-content-section">
                    <div class="form-group row">
                        <div class="col-sm-3 suggested-modal-content-text">Is It Closed?</div>
                        <div class="col-sm-9">
                            <div class="form-check">
                                <input class="form-check-input suggest-edit-form-check-input" type="checkbox"
                                       id="gridCheck1">
                                <label class="form-check-label suggested-modal-content-text" for="gridCheck1">
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
                                       id="gridCheck1">
                                <label class="form-check-label suggested-modal-content-text" for="gridCheck1">
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
                                       id="gridCheck1">
                                <label class="form-check-label suggested-modal-content-text" for="gridCheck1">
                                    I'm the owner (manager) of the business
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 suggested-modal-content-text">Business Name</div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="business_name" id="business_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 suggested-modal-content-text">Address</div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="business_address" id="business_address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 suggested-modal-content-text">Phone</div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="business_phone" id="business_phone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 suggested-modal-content-text">Website Url</div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="website_url" id="website_url">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 suggested-modal-content-text">Price list Url</div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="price_list_url" id="price_list_url">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 suggested-modal-content-text">Hours of Operation</div>
                        <div class="col-sm-9">
{{--                            <input type="text" class="form-control" name="price_list_url" id="price_list_url">--}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 suggested-modal-content-text">Your Message</div>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="your_message" id="your_message" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send</button>
            </div>
        </div>
    </div>
</div>
