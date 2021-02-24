<template>
    <div>
        <div class="wrapper">
            <div class="product-info">
                <router-link :to="'/note/'+id">
                <div class="product-text">
                    <h1>{{title}}</h1>
                    <h2>{{date}}</h2>
                    <p>{{description}}</p>
                </div>
                </router-link>
                <div class="product-price-btn">
                    <svg @click="deleteNote(id)" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash delete" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                    <router-link :to="{name:'CreateNote', params:{title:title,id:id,description:description,edit: true}}">
                        <button type="button">Изменить</button>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        title: {
            type: String,
            default: "NULL"
        },
        description: {
            type: String,
            default: "NULL"
        },
        date: {
            type: String,
            default: "NULL"
        },
        id: {
          type: Number,
          default: null
        }
    },
    methods: {
        deleteNote(id) {
            this.$emit('deleteNote',id)
        }
    }
}
</script>

<style scoped>

a {  text-decoration: none;}
.product-img {
    float: left;
    height: 420px;
    width: 327px;
}

.product-img img {
    border-radius: 7px 0 0 7px;
}

.product-info {
    text-decoration: none !important;
    margin: 20px;
    float: left;
    height: 420px;
    width: 327px;
    border-radius: 0 7px 10px 7px;
    border: 1px solid black;
    background-color: #ffffff;
}

.product-text {
    height: 300px;
    width: 327px;
}

.product-text h1 {
    margin: 0 0 0 38px;
    padding-top: 52px;
    font-size: 34px;
    color: #474747;
}

.product-text h1,
.product-price-btn p {
    font-family: 'Bentham', serif;
}

.product-text h2 {
    margin: 0 0 47px 38px;
    font-size: 13px;
    font-family: 'Raleway', sans-serif;
    font-weight: 400;
    text-transform: uppercase;
    color: #d2d2d2;
    letter-spacing: 0.2em;
}

.product-text p {
    height: 125px;
    margin: 0 0 0 38px;
    font-family: 'Playfair Display', serif;
    color: #8d8d8d;
    line-height: 1.7em;
    font-size: 15px;
    font-weight: lighter;
    overflow: hidden;
}

.product-price-btn {
    height: 103px;
    width: 327px;
    margin-top: 17px;

}

.product-price-btn p {
    display: inline-block;
    position: absolute;
    top: -13px;
    height: 50px;
    font-family: 'Trocchi', serif;
    margin: 0 0 0 38px;
    font-size: 28px;
    font-weight: lighter;
    color: #474747;
}

.delete{
    margin-left:50px;
    display: inline-block;
    height: 50px;
    font-family: 'Suranna', serif;
    font-size: 34px;
}

.product-price-btn button {
    float: right;
    display: inline-block;
    height: 50px;
    width: 176px;
    margin: 0 40px 0 16px;
    box-sizing: border-box;
    border: transparent;
    border-radius: 60px;
    font-family: 'Raleway', sans-serif;
    font-size: 14px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.2em;
    color: #ffffff;
    background-color: #9cebd5;
    cursor: pointer;
    outline: none;
}

.product-price-btn button:hover {
    background-color: #79b0a1;
}

</style>
