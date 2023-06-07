
@include('includes.head')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <body >
    @include('includes.navbar')
    @include('includes.sidenav')
           
            <div id='center' class="main center">
                


             
    <div class="section">
	<div class="chart">
	<canvas id="myChart" class="myChart" aria-label="This is a Chart" role="img"></canvas>
	</div>
    </div>

               
            </div>

            <script>
const settings = {
	options: {
		responsive: true,
		responsiveAnimationDuration: 400,
		maintainAspectRatio: false,
		aspectRatio: 2,
		//onResize: () => { console.log('Resized') },
		devicePixelRatio: window.devicePixelRatio,
		hover: {
			mode: 'nearest', // 'nearest', 'point', 'index', 'dataset', 'x', 'y'
			animationDuration: 400,
		}
	},
	itemOpacity: 0.8,
	itemHoverOpacity: 1,
	colors: {},
};


settings.colors = {
	Mascotas: {
		rgb: '120, 209, 151',
		gradient: ['122, 210, 152', '43, 218, 165'],
		borderColor: '#2BDAA5',
		shadow: '0px 16px 48px rgba(0, 255, 56, 0.48)',
	}, 
	Proteina: {
		rgb: '108, 201, 190',
		gradient: ['109, 201, 191', '111, 226, 213'],
		borderColor: '#6FE2D5',
		shadow: '0px 16px 48px rgba(0, 240, 255, 0.48)',
	}, 
	Frutas: {
		rgb: '114, 169, 219',
		gradient: ['152, 162, 255', '114, 169, 219'],
		borderColor: '#98A2FF',
		shadow: '0px 16px 48px rgba(0, 102, 255, 0.48)',
	}, 
	Vegetales: {
		rgb: '254, 193, 102',
		gradient: ['254, 194, 104', '250, 243, 92'],
		borderColor: '#F9E683',
		shadow: '0px 16px 48px rgba(247, 252, 0, 0.48)',
	}, 
	Embutidos: {
		rgb: '242, 106, 120',
		gradient: ['242, 110, 123', '255, 123, 179'],
		borderColor: '#FF7BB3',
		shadow: '0px 16px 48px rgba(255, 0, 46, 0.48)',
	}, 
	Congelados: {
		rgb: '233, 147, 224',
		gradient: ['233, 148, 224', '226, 156, 247'],
		borderColor: '#E09FFF',
		shadow: '0px 16px 48px rgba(143, 0, 255, 0.48)',
	}, 
	Quesos: {
		rgb: '142, 204, 120',
		gradient: ['144, 205, 122', '138, 214, 86'],
		borderColor: '#89D94B',
		shadow: '0px 16px 48px rgba(36, 255, 0, 0.48)',
	}, 

	Lacteos: {
		rgb: '174, 143, 253',
		gradient: ['181, 157, 241', '174, 143, 253'],
		borderColor: '#AE8FFD',
		shadow: '0px 16px 48px rgba(72, 0, 255, 0.4)',
	}, 
	Bebes: {
		rgb: '255, 152, 119',
		gradient: ['255, 157, 135', '255, 152, 119'],
		borderColor: '#FF9877',
		shadow: '0px 16px 48px rgba(255, 61, 0, 0.48)',
	}
};

const colors = settings.colors;

// Get random set of colors
function shuffleColors() {
		let array = Object.keys(colors);
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
		return array;
}

function randomValues(length = 10, max = 10) {
	return [...new Array(length)].map(() => Math.round(Math.random() * max));
}

function createGradient(ctx, colorIndex) {
	let h = ctx.canvas.height * 2;
	const gradient = ctx.createLinearGradient(0, 0, 0, h);
	const steps = colors[colorIndex].gradient;
	/*
	const shadow = colors[colorIndex].shadow.split(' ');
	const s = {
		x: shadow.splice(0,1).join(''),
		y: shadow.splice(0,1).join(''),
		blur: shadow.splice(0,1).join(''),
		color: shadow.join(' '),
	}
	ctx.shadowColor = "#000";
	ctx.shadowBlur = 20;
	ctx.shadowOffsetX = 15;
	context.shadowOffsetY = 15;
	*/
	for (let i = 0; i < steps.length; i++) {
		let clr = colors[colorIndex].gradient[i];
		let offset = i === 0 ? 0 : (1 / (steps.length - 1) * i);
		gradient.addColorStop( offset, `rgba(${clr}, 1)`); 
	}
	return gradient;
}

const set = shuffleColors();

const ctx = document.getElementById('myChart').getContext('2d');

const myChart = new Chart(ctx, {
	type: 'bar',
	data: {
		labels: set,
		datasets: [{
			label: 'Caption',
			data: randomValues(set.length),
			backgroundColor: [...set].map((color) => { 
				return createGradient(ctx, color); 
			}),
			/*
			backgroundColor: [...set].map((color) => { 
				return `rgba(${colors[color].rgb}, ${settings.itemOpacity})`; 
			}),
			*/
			hoverBackgroundColor: [...set].map((color) => { 
				return `rgba(${colors[color].rgb}, ${settings.itemHoverOpacity})`; 
			}),
			borderColor: [...set].map((color) => { 
				return colors[color].borderColor
			}),
			borderWidth: 1,
			// hoverBordercolor: [],
			// hoverBorderWidth: 1,
			borderSkipped: 'bottom',
		}]
	},
	options: {
		...settings.options,
	}
});
</script>

    @include('includes.footer')
                       

  