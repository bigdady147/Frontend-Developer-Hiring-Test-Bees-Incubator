<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/web/index.css') }}">
    <title>Question 1 - Convert RGB to Hex</title>
</head>
<body>


<section id="app" class="rgb-to-hex">
    <div class="container">
        <h2>Convert RGB to HEX</h2>
        <div class="form-item">
            <label for="r-color">R:</label>
            <input max="255" v-model="r_color" id="r-color" type="number">
        </div>
        <div class="form-item">
            <label for="g-color">G:</label>
            <input max="255" v-model="g_color" id="g-color" type="number">
        </div>
        <div class="form-item">
            <label for="b-color">B:</label>
            <input max="255" v-model="b_color" id="b-color" type="number">
        </div>
        <button :disabled="r_color !== 0 && g_color == 0 && b_color == 0" @click="convertRGBtoHex(r_color,g_color,b_color)" class="convert">Convert</button>
        <div class="block-result">
            <span class="result">Result:</span>
            <span :style="{background: background_binding}" class="color"></span>
        </div>
    </div>

</section>



<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('slick/slick/slick.min.js') }}"></script>
<script src="https://unpkg.com/vue@2"></script>
<script src="https://unpkg.com/jquery@3.1.1/dist/jquery.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        let app = new Vue({
            el: '#app',
            data: {
                item_edit: {},
                r_color: 0,
                g_color: 0,
                b_color: 0,
                background_binding: '#fff',
            },
            created() {
                let vm = this;
            },
            mounted() {
                let vm = this;
            },
            methods: {
                convertRGBtoHex(r,g,b){
                    let vm = this;
                    if(r < 255 || g < 255 || b < 255){
                        r = Math.round(r);
                        g = Math.round(g);
                        b = Math.round(b);
                        let hexR = r.toString(16).padStart(2, '0');
                        let hexG = g.toString(16).padStart(2, '0');
                        let hexB = b.toString(16).padStart(2, '0');
                        let result = `#${hexR}${hexG}${hexB}`;
                        vm.background_binding = result;
                        console.log(result);
                        return result;
                    }else{
                        alert('Input value should not be more than 255');
                    }
                },
            }
        })
    })
</script>


</body>
</html>
