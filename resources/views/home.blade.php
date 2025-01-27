@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" id="data_div">
                {{-- DATA POST COMING FROM AJAX --}}
            </div>
            <div class="ajax-load text-center" style="display:none">
                <i class="mdi mdi-48px mdi-spin mdi-loading"></i> Loading ...
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let pages = 2;
        let current_page = 0;
        let bool = false;
        let lastPage ;

        $(window).scroll(function (){
            let  height = $(document).height();
            if($(window).scrollTop() + $(window).height() >= height && bool == false && lastPage > pages - 2) {
                bool = true;
                $('.ajax-load').show();
                lazyLoad(pages).then(() => {
                    bool = false;
                    pages++;
                    if(pages - 2 == lastPage) {
                        $('.no-data').show();
                    }
                })
            }
        })

        function lazyLoad(page){
            let url = "{{ route('data') }}";
            return new Promise((resolve,reject) => {
                $.ajax({
                    url: url+'?page='+page,
                    type:'GET',
                    beforeSend:function() {
                        $('.ajax-load').show();
                    }, 
                    success :function (response){
                        console.log(response);
                        $('.ajax-load').hide();
                        let html = '';
                        for(let i = 0; i < response.data.data.length;i++){
                            html += `
                                <div class="card mx-auto" style="max-width: 600px; border-radius: 15px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); margin-bottom: 20px;">
                                    <div class="card-body">
                                        <!-- Author and Date -->
                                        <div class="d-flex align-items-center mb-3">
                                            <img src="{{ asset('images/virgo.jpeg') }}"
                                                alt="Author" class="author-img me-3">
                                            <div>
                                                <h6 class="mb-0 font-weight-bold"> Virgo Stevanus <small class="text-primary">follow</small></h6>
                                                <small class="text-muted">${response.data.data[i].created_at}</small>
                                            </div>
                                        </div>
                                        <!-- Content -->
                                        <p class="content">
                                            ${response.data.data[i].content}
                                        </p>
                                        <!-- Image -->
                                        ${response.data.data[i].image ? `<img src="{{ asset('storage/post/images/`+response.data.data[i].image+`') }}" alt="Post Image" class="img-fluid rounded mb-3">` : ''}
                                        <!-- Tags -->
                                        <div class="d-flex flex-wrap">
                                            ${response.data.data[i].tags.map(tag => `<span class="tag">${tag.name}</span>`).join('')}
                                        </div>
                                    </div>
                                </div>
                            `;
                        }
                        $('#data_div').append(html);
                        resolve();
                    }
                });
            })
        }

        loadData(1);
        function loadData(page){
            let url = "{{ route('data') }}";
            $.ajax({
                url: url+'?page='+page,
                type:'GET',
                beforeSend:function() {
                    $('.ajax-load').show();
                },
                success :function (response){
                    console.log(response);
                    
                    $('.ajax-load').hide();
                    lastPage = response.data.last_page;
                    let html = '';
                    for(let i = 0; i < response.data.data.length;i++){
                        html += `
                            <div class="card mx-auto" style="max-width: 600px; border-radius: 15px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); margin-bottom: 20px;">
                                <div class="card-body">
                                    <!-- Author and Date -->
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="{{ asset('images/virgo.jpeg') }}"
                                            alt="Author" class="author-img me-3">
                                        <div>
                                            <h6 class="mb-0 font-weight-bold"> Virgo Stevanus <small class="text-primary">follow</small></h6>
                                            <small class="text-muted">${response.data.data[i].created_at}</small>
                                        </div>
                                    </div>

                                    <!-- Content -->
                                    <p class="content">
                                        ${response.data.data[i].content}
                                    </p>

                                    <!-- Image -->
                                    ${response.data.data[i].image ? `<img src="{{ asset('storage/post/images/`+response.data.data[i].image+`') }}" alt="Post Image" class="img-fluid rounded mb-3">` : ''}
                                    <!-- Tags -->
                                    <div class="d-flex flex-wrap">
                                        ${response.data.data[i].tags.map(tag => `<span class="tag">${tag.name}</span>`).join('')}
                                    </div>
                                </div>
                            </div>
                        `;
                    }
                    $('#data_div').html(html);
                }
            });
        }
    </script>
@endsection 