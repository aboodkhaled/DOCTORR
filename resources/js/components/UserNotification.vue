<template>
      
</template>

<script>
    export default {
       data: function(){
           return {
               read: {},
               unread: {},
               unreadCount: 0
           }
       },
       created: function () {
           this.getNotification();
           let adminId = $('meta[name="adminId"]').attr('content');
           Echo.private('App.model.admin.' + adminId)
           .notification((notification)=>{
               this.unread.unshift(notification);
               this.unreadCount++; 
           });
       },
       methods:{
           getNotification(){
               axios.get('user/notification/get').then(res =>{
                   this.read = res.data.read;
                   this.unread = res.data.unread;
                   this.unreadCount = res.data.read.length;

               }).catch(error => Exception.handle(error)) 
           },
           readNotifications(notification){
               axios.post('user/notification/read', {id:notification.id}).then(res => {
                   this.unread.splice(notification, 1);
                   this.read.push(notification);
                   this.unreadCount--;

               })
           }
       }
    }
</script>
