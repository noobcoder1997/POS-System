<style>
    /* My Style */

    html, body, footer, div{
        font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
    .card-registration, .card-password{
        margin-bottom:48px;
        /* From https://css.glass */
        /* background: rgba(255, 255, 255, 0.2);
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.3); */
    }
    /* .card-login{ */
        /* background: rgba(255, 255, 255, 0.2);
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.3); */
    /* } */

    /* Background image */
    #img-login, #img-password, #img-register {
        position:absolute;
        width:100%;
        height:100%;
        filter: blur(8px);
        -webkit-filter: blur(8px); 
        z-index:-1;
        object-fit: fill;
    }

    /* #img-register {
        position:fixed;
        width:100%;
        height:100%;
        filter: blur(8px);
        -webkit-filter: blur(8px); 
        z-index:-1;
        object-fit: fill;
        inline-size: auto;
    } */
    /* Background image */

    /* Pre loader */

    .loader {
        border: 13px solid #f3f3f3;
        border-radius: 50%;
        border-top: 13px solid lightgray;
        border-right: 13px solid gray;
        border-bottom: 13px solid lightgray;
        border-left: 13px solid gray;
        width: 100px;
        height: 100px;
        -webkit-animation: spin 0.7s linear infinite;
        animation: spin 0.7s linear infinite;
        /* center position */
        position: absolute; 
        justify-content: center;
        align-items: center;
        z-index:99999;
        display: none;
        margin: auto; 
        top: 50%;
        opacity: 40%;
    }

    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        50% { transform: rotate(100deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        50% { transform: rotate(100deg); }
        100% { transform: rotate(360deg); }
    }
    /* Pre loader */
    #button-addon2{
            display: none;
    }

    @media screen and (min-width:320px) {
        .card-login{
            margin-bottom: 30px;
        } 
    }

    @media only screen and (max-width:480px) {
        #camera { 
            width: 100%; 
            height:200px;
        }
            
        #camera video{ 
            width: 100%;
            height:200px; 
        }
    }


    ::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px #F5F5F5;
        /* border-radius: 2px; */
        /* background-color: rgba(0,0,0,0.3); */
    }

    ::-webkit-scrollbar
    {
        width: 2px;
        background-color: #555;
    }

    ::-webkit-scrollbar-thumb
    {
        /* border-radius: 2px; */
        /* -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3); */
        background-color: #F5F5F5;
    }

    input[type=checkbox] {
        width:25px; height:25px; margin: 0 12px 17px 12px; accent-color: #7a7775;
    }

    p#status{
        margin: 15px 12px 5px 12px;
    }
    .shadow{
        box-shadow: 0 0 15px 0;
    }
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        appearance: textfield;
    }

    .selected{
        background: none;
    }

    #scan-status{
        margin-left: 13px;
        margin-top: 14px;
        margin-bottom: 3px;
    }
    #scan-status1, #_scan-status{
        margin-left: 13px;
        margin-top: 0;
    }
    li a{
        cursor: pointer;
        font-weight: normal;
    }
    li a.text-white:hover, li a:active, li a:focus{
        color: #6c757d;
        background-color: transparent;
    }

</style>