<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
</head>
<main>
    <style>
        #footer {
            background-color: #335080;
            line-height: 60px;
        }
        #bluecont{
            color: white;
            margin: 0 22%;
            padding: 2% 0;
        }
        #footer p{
            line-height: 40px;
        }
        .center {
            text-align: center;
            font-size: 25px;
        }
        .collapse{
            border: 1px solid #335080;
            background-color: #335080;
        }
        .clps{
            margin-left: -10%;
            width: 120%;
            height: 55px;
            background-color: #4e6ea1;
            color: white;
            font-size: 20px;
            border-radius: 5px;
            border-style:hidden ;
            font-family:'Times New Roman', Times, serif;
            cursor: pointer;
            transition: background 0.2s;
        }
        .clps--active + .clps_content{
            display: block;
        }
        .clps::after {
            content: '\25be';
            float: right;
            transform: scale(1.5);
        }
        .clps--active {
            opacity: 0.6;
        }
        .clps--active::after{
            content: '\25b4';
        }
        .clps_content {
            margin-left: -10%;
            width: 120%;
            font-family:sans-serif;
            background: #8da9d4; 
            display: none;
            overflow: auto;
        }
        .clps_content p {
            line-height: 30px;
            padding: 7.5px 15px;
        }
        .socials{
            list-style: none;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 2rem 0 0 0;
        }
        
        .socials li{
            margin: 0 10px;
        }
        
        .socials a{
            text-decoration: none;
            color: #fff;
            border: 1.1px solid white;
            border-radius: 50%;
            padding: 7.5px;
        }
        
        .socials a i{
            text-align: center;
            font-size: 0.9rem;
            width: 20px;
            transition: color .4s ease;
            bottom: 0;
        }
        
        .socials a:hover i{
            color: #afafaf;
        }
    </style>
    <section id="footer">
        <div id="bluecont">
            <h1 class="center">It's great having you here</h1>
                <ul class="socials">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
             </ul>
        </div>
    </section>
    <script>
        document.querySelectorAll('.clps').forEach(button => {
            button.addEventListener('click', () =>{
                // button.classList.toggle('clps--active');
                $('.clps_content').slideToggle('slow')
            })
        });
        
    </script>
</main>