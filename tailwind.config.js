/** @type {import('tailwindcss').Config} */
module.exports = {
	content: ["./application/views/**/*.php"],
	theme: {
		screens: {
			sm: "640px",
			md: "768px",
			lg: "1024px",
			xl: "1280px",
		},
		extend: {
			backgroundImage: {
				"hero1": 'linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("../img/hero1.webp")',
				"hero2": 'linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7)), url("../img/hero2.jpg")',
			},
			colors: {
				primary: "#9c4a29",
				secondary: "#edebe4",
				three: "#c9ba86",
			},
			animation: {
				popupAnimation: "popupAnimation 0.3s ease",
				scrollAnitmation: "scrollAnitmation 0.3s ease",
			},
			keyframes: {
				popupAnimation: {
					"0%": { transform: "scale(0.5)", opacity: 0 },
					"100%": { transform: "scale(1)", opacity: 1 },
				},
				scrollAnitmation: {
					"0%": { transform: "translateY(-100%)" },
					"100%": { transform: "translateY(0)" },
				},
			},
		},
		container: {
			center: true,
		},
		fontFamily: {
			"open-sans": ['"Open Sans"'],
		},
	},
	plugins: [],
};

