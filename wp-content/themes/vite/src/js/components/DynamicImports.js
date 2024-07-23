// import { componentList } from '../componentList';

// import { importComponent } from '../utils';
// import Header from '@components/Header'; // Example import using the alias

// export default class DynamicImports {
//     constructor() {
//         this.init();
//     }

//     init = () => {
//         this.setDomMap();
//         this.bindEvents();
//         this.components();
//     };

//     setDomMap = () => {
//         this.window = $(window);
//     };

//     bindEvents = () => {
//         this.window.scroll(this.windowScroll);
//     };

//     windowScroll = () => {
//         this.components();
//     };

//     components = () => {
//         if (componentList) {
//             $.each(componentList, (_, { element: el, className: classID, mobile }) => {
//                 if (!mobile && max767.matches) return;

//                 console.log(`Attempting to import component: ${classID} for element:`, el);
//                 this.importComponent(el, classID);
//             });
//         } else {
//             console.error('componentList is not defined or empty.');
//         }
//     };

// importComponent = async (element, className) => {
//     try {
//         // Create a dynamic import map
//         const modules = import.meta.glob('@components/*.js');

//         // Construct the path using the alias
//         const modulePath = `@components/${className}.js`;

//         // Resolve the actual module path from the dynamic import map
//         const resolvedModulePath = Object.keys(modules).find(path => path.includes(`${className}.js`));

//         if (resolvedModulePath) {
//             console.log(`Module found for ${resolvedModulePath}`);
//             const module = await modules[resolvedModulePath]();
//             const ComponentClass = module.default;
//             new ComponentClass(element);
//         } else {
//             console.error(`Component ${className} not found at ${modulePath}`);
//         }
//     } catch (error) {
//         console.error(`Error importing component ${className}:`, error);
//     }
// };
// }


// TEST CODE
import { componentList } from '../componentList';
import { max767 } from "../utils";

export default class DynamicImports {
    constructor() {
        // Bind methods to the class context
        this.init = this.init.bind(this);
        this.setDomMap = this.setDomMap.bind(this);
        this.bindEvents = this.bindEvents.bind(this);
        this.windowScroll = this.windowScroll.bind(this);
        this.components = this.components.bind(this);
        this.importComponent = this.importComponent.bind(this);

        this.init();
    }

    init() {
        this.setDomMap();
        this.bindEvents();
        this.components();
    }

    setDomMap() {
        this.window = $(window);
    }

    bindEvents() {
        this.window.scroll(this.windowScroll);
    }

    windowScroll() {
        this.components();
    }

    components() {
        if (componentList) {
            // console.log('componentList:', componentList); // Log componentList
            $.each(componentList, (_, { element: el, className: classID, mobile }) => {
                if (!mobile && max767.matches) return;

                const $el = $(el); // Ensure element is a jQuery object
                // console.log(`Attempting to import component: ${classID} for element:`, $el);
                this.importComponent($el, classID);
            });
        } else {
            // console.error('componentList is not defined or empty.');
        }
    }

    async importComponent(element, className) {
        if (element.length && !element.hasClass("init")) {
            // console.log(`Importing component ${className} for element`, element); // Log element
            try {
                // Create a dynamic import map
                const modules = import.meta.glob('@components/*.js');
                // console.log('Modules:', modules); // Log the modules map

                // Resolve the actual module path from the dynamic import map
                const resolvedModulePath = Object.keys(modules).find(path => path.includes(`${className}.js`));
                // console.log(`Resolved module path for ${className}:`, resolvedModulePath); // Log resolved path

                if (resolvedModulePath) {
                    // console.log(`Module found for ${resolvedModulePath}`);
                    const module = await modules[resolvedModulePath]();
                    // console.log(`Imported module for ${className}:`, module); // Log imported module
                    const ComponentClass = module.default;
                    new ComponentClass(element);
                    element.addClass("init");
                } else {
                    // console.error(`Component ${className} not found in @components/`);
                }
            } catch (error) {
                // console.error(`Error importing component ${className}:`, error);
            }
        } else {
            // console.log(`Element already initialized or not found:`, element); // Log if element is already initialized or not found
        }
    }
}

