<template>
    <div>
    
        <slot name="trigger"></slot>
        
        <slot name="links"></slot>
        
    </div>

</template>

<script>
    export default {
        data() {
            return { isOpen: false }
        }
    }
</script>