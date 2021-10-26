{{-- NOTIFICACION --}}
@if ($type)
    <div id="registerToast" class="toast mx-4 border-0 " role="alert" aria-live="assertive" aria-atomic="true" data-delay="4000" style="position: absolute; left:0; z-index:9999; background:rgba(147, 235, 125, 0.87); " >
@else
    <div id="registerToast" class="toast mx-4 border-0 " role="alert" aria-live="assertive" aria-atomic="true" data-delay="4000" style="position: absolute; left:0; z-index:9999; background:rgba(235, 125, 125, 0.87); " >
@endif
    <div class="toast-body d-flex justify-content-between" >
        <div class="center" >
            @if ($type)    
                <svg class="icon text-success " viewBox="0 0 20 20">
                    <path d="M7.197,16.963H7.195c-0.204,0-0.399-0.083-0.544-0.227l-6.039-6.082c-0.3-0.302-0.297-0.788,0.003-1.087
                    C0.919,9.266,1.404,9.269,1.702,9.57l5.495,5.536L18.221,4.083c0.301-0.301,0.787-0.301,1.087,0c0.301,0.3,0.301,0.787,0,1.087
                    L7.741,16.738C7.596,16.882,7.401,16.963,7.197,16.963z"></path>
                </svg>
            @else 
                <svg class="icon text-danger " viewBox="0 0 20 20">
                    <path d="M11.469,10l7.08-7.08c0.406-0.406,0.406-1.064,0-1.469c-0.406-0.406-1.063-0.406-1.469,0L10,8.53l-7.081-7.08
                    c-0.406-0.406-1.064-0.406-1.469,0c-0.406,0.406-0.406,1.063,0,1.469L8.531,10L1.45,17.081c-0.406,0.406-0.406,1.064,0,1.469
                    c0.203,0.203,0.469,0.304,0.735,0.304c0.266,0,0.531-0.101,0.735-0.304L10,11.469l7.08,7.081c0.203,0.203,0.469,0.304,0.735,0.304
                    c0.267,0,0.532-0.101,0.735-0.304c0.406-0.406,0.406-1.064,0-1.469L11.469,10z"></path>
                </svg>
            @endif
            <span class="mx-2" >{{$slot}}</span>
        </div>
        <button type="button" class="ml-2 mb-1 close " style="outline: 0;"  data-dismiss="toast" aria-label="Close" >
            <span aria-hidden="true" >&times;</span>
        </button>
    </div>
</div>



