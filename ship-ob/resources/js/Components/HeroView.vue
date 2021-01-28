<template>
    <div class="hero-view-container" :style="posscss">
        <div class="ballon-container">
            <div class="balloon-shape">
                <div class="">
                    todos....
                </div>
                <div class="">
                    todos....
                </div>
                <div class="">
                    todos....
                </div>
            </div>
        </div>
        <div class="avatar-container">
            <div class="avatar-top">    
                <img class="img-fluid" src="img/avatar.png" />
            </div>
            <div class="avatar-floor"></div>
            <div class="avatar-shadow"></div>
        </div>
        <div>{{ heroInfo.name }}</div>
    </div>
</template>

<style lang="sass" scoped>

.hero-view-container {
    width: 110px;
    position: absolute;
    border: none;
    background-color: none;
};
.avatar-container {
    transform-style: preserve-3d;
    transform: rotateX(-30deg) rotateY(30deg);
    position: relative;
    margin: 0px;
}

.avatar-top {
    transform-style: preserve-3d;
    transform-origin: bottom;
    position: relative;
    transform: rotateX(10deg); 
    padding: 4px 9px 1px 9px;
    border: 1px solid #808080;
    background-color: #d0d0d070;
}
.avatar-floor {
    transform-style: preserve-3d;
    transform: rotateX(80deg);
    transform-origin: top;
    position: relative;
    width: 100%;
    height: 50px;    
    border: 1px solid #808080;
    background-color: #f0f0f070;
}
.avatar-shadow {
    transform-style: preserve-3d;
    transform: translateY(9px) rotateX(80deg) ;
    transform-origin: 0px 0px;
    position: absolute;
    bottom: 0px;
    left: 0px;
    width: 100%;
    height: 50px;    
    border: none;
    background: linear-gradient(to top right, #24242430, #24242408);
}


.balloon-container {
    position: relative;
    transform-style: preserve-3d;
    transform: transrateX(20px);
}

.balloon-shape {
  position: relative;
  display: inline-block;
  margin: 1.5em 0;
  padding: 7px 10px;
  min-width: 120px;
  max-width: 100%;
  color: #555;
  font-size: 16px;
  background: #99c4ffaf;
  border-radius: 15px;
}

.balloon-shape:before {
  content: "";
  position: absolute;
  top: 100%;
  left: 30%;
  margin-left: -15px;
  border: 15px solid transparent;
  border-top: 15px solid #99c4ffaf;
}

.balloon-shape p {
  margin: 0;
  padding: 0;
}
</style>

<script>
import gsap from 'gsap';

console.log(gsap);  

export default {
    props: {
        heroInfo: {
            default: {
                name: 'xxxx',
                x: 0,
                y: 0,
            },
            type: Object,
        },
    },
    data: function() {

        return {
            position: {
                x: this.heroInfo.x,
                y: this.heroInfo.y,
            },
        };
    },
    
    mounted: function() {

    },
    watch: {
        heroInfo: function() {
            console.log('wached!!', this.heroInfo);
        },
        'heroInfo.x': function() {
            gsap.to(this.position, {
                duration: 1,
                ease: 'power1.out',
                x: this.heroInfo.x,
                onUpdate: function() {
                    // console.log('on-update');
                }
            });            
        },
        'heroInfo.y': function() {
            gsap.to(this.position, {
                duration: 1,
                ease: 'power1.out',
                y: this.heroInfo.y,
                onUpdate: function() {
                    // console.log('on-update');
                }
            });            
        },

    },

    computed: {
        posscss: function() {
            
            var w = 70;// - (120 * (this.position.y / 600));
            var h = 90;// - (240 * (this.position.y / 600));
            return {
                left: this.position.x + 'px',
                bottom: this.position.y + 'px',
                width: w + 'px',
                height: h + 'px',
                zIndex: 1000000000 - this.position.y,
// transform: 'perspective(500px) translateZ(-9.7rem)',
            };
        },
    },

}
</script>