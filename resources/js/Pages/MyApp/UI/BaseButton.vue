<template>
    <button class="bg-red-700 font-inherit text-white py-1 px-8 cursor-pointer focus:outline-none">
        <slot></slot>
    </button>
</template>

<style scoped>
button:hover,
button:active {
    border-bottom: 4px solid black;
    font-weight: bold;
    margin: 0;
    padding-bottom: 0;
}
</style>
