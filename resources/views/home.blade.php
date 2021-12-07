<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>



</head>
<body>
<!--main page-->
<div id="app">
<main class="pt-10 pb-20">
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold">Біржа вантажів</h1>
        <div class="flex flex-col pt-4 pb-8 gap-y-2 lg:w-2/3 xl:w-1/2">
            <button class="border-none rounded bg-blue-600 text-white font-bold py-2 px-8 inline-block mr-auto"  @click="isOpen = true">
                Додати
            </button>
            <div class="">Всього: 35 вантажів</div>
            <div class="w-full border divide-y">
                <div class="grid grid-cols-5 font-bold">
                    <div class="py-1 px-4">Дата</div>
                    <div class="py-1 px-4 col-span-2">Маршрут</div>
                    <div class="py-1 px-4">Вантаж</div>
                    <div class="py-1 px-4">Вага</div>
                </div>
                <div class="divide-y flex flex-col">
                   {{--  <div class="divide-y border border-blue-600">
                        <div class="w-full grid grid-cols-5">
                            <div class="py-1 px-4">10.02.21</div>
                            <div class="py-1 px-4 col-span-2">Київ - Миколаїв</div>
                            <div class="py-1 px-4">Кукурудза</div>
                            <div class="py-1 px-4">10т</div>
                        </div>



                        <div class="h-80 hidden" >
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5441169.1233852515!2d26.69303850676986!3d48.248575770282166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d1d9c154700e8f%3A0x1068488f64010!2sUkraine!5e0!3m2!1sen!2sru!4v1636544003860!5m2!1sen!2sru" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
 --}}

                    <div v-for="item in outData"  :key="item.id" >
                            <div class="w-full grid grid-cols-5">
                                <div class="py-1 px-4">@{{ item.date }}</div>
                                <div class="py-1 px-4 col-span-2">@{{ item.route }}</div>
                                <div class="py-1 px-4">@{{ item.name }}</div>
                                <div class="py-1 px-4">@{{ item.weight }}т</div>
                            </div>
                        </div>
                        <div class="h-40 hidden"></div>


                        @foreach($points as $point)
                         <div class="divide-y">

                                <div class="w-full grid grid-cols-5">
                                    <div class="py-1 px-4">{{date('d-m-Y', strtotime($point->date))}}</div>
                                    <div class="py-1 px-4 col-span-2">{{$point->route}}</div>
                                    <div class="py-1 px-4">{{$point->name}}</div>
                                    <div class="py-1 px-4">{{$point->weight}}т</div>
                                </div>
                                <div class="h-40 hidden"></div>
                            </div>
                        @endforeach


                </item>
            </div>
        </div>
    </div>
</main>
<!--TODO Для відображення модалу видалити класс hidden у наступного блоку-->
<!--modal overlay-->
<div class="fixed inset-0 flex items-center justify-center " :class="isOpen ? '' : 'hidden'" style="background: rgba(0, 0, 0, 0.4)">
    <!--    modal body-->
    <div class="bg-white w-1/3 p-5 flex flex-col gap-4 relative">
        <!--        close button-->
        <button class="absolute right-5 top-5 h-4 w-4" @click="isOpen = false">
            <span class="bg-gray-300 absolute transform rotate-45 block h-0.5 w-4"></span>
            <span class="bg-gray-300 absolute transform -rotate-45 block h-0.5 w-4"></span>
        </button>
        <!--        title-->
        <h2 class="text-xl font-bold">Нове замовлення</h2>
        <!--        form-->
        <form class="flex flex-col gap-y-6" @submit.prevent="sendForm">
            <div class="grid grid-cols-2 gap-4">
                <label>
                    <input class="border rounded py-2 px-4 w-full" type="text" name="from" placeholder="Звідки" v-model='sendData.from'>
                </label>
                <label>
                    <input class="border rounded py-2 px-4 w-full" type="text" name="to" placeholder="Куди" v-model='sendData.to'>
                </label>
                <label>
                    <input class="border rounded py-2 px-4 w-full" type="text" name="name" placeholder="Назва вантажу" v-model='sendData.load'>
                </label>
                <label>
                    <input class="border rounded py-2 px-4 w-full" type="text" name="weight" placeholder="Вага, кг" v-model='sendData.weight'>
                </label>
            </div>
            <button class="border-none rounded bg-blue-600 text-white font-bold py-2 px-8 inline-block ml-auto" type="submit">
                Додати
            </button>
        </form>
    </div>
</div>
</div>
<script>
  var app = new Vue({
  el: '#app',
  data: {
    isOpen:false,
    sendData:{
        from:'',
        to:'',
        load:'',
        weight:'',
    },
    outData:[]
  },
  methods:{
    sendForm: function(){

    axios.post('/api/add',
      this.sendData
    )
    .then( (response) =>{

        if(response.data.error!=null){
            console.log(response.data.error)

        }
        else{
            this.isOpen = false
            this.outData.unshift(response.data)
        }
    })
    .catch( (error) =>{
        console.log(error);
    })
    },

  }
})
</script>

</body>
</html>