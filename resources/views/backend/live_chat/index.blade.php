@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Live Chat Settings</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('backoffice.livechat.store') }}" method="POST">
                        @csrf

                        <!-- Live Chat Link -->
                        <div class="row align-items-center mb-4">
                            <div class="col-md-3">
                                <label class="form-label mb-md-0">Live Chat Link</label>
                            </div>
                            <div class="col-md-9">
                                <input type="url" class="form-control" name="link_livechat"
                                    value="{{ old('link_livechat', $liveChat->link_livechat ?? '') }}">
                            </div>
                        </div>

                        <!-- Live Chat Code -->
                        <div class="row align-items-center mb-4">
                            <div class="col-md-3">
                                <label class="form-label mb-md-0">Live Chat Code</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="code_livechat"
                                    value="{{ old('code_livechat', $liveChat->code_livechat ?? '') }}">
                            </div>
                        </div>

                        <!-- Live Chat Script -->
                        <div class="row align-items-center mb-4">
                            <div class="col-md-3">
                                <label class="form-label mb-md-0">Live Chat JS Script</label>
                            </div>
                            <div class="col-md-9">
                                <textarea name="scripts_js_livechat" class="form-control" rows="5">{{ old('scripts_js_livechat', $liveChat->scripts_js_livechat ?? '') }}</textarea>
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary ms-2">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
