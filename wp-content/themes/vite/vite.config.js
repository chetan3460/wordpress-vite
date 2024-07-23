import { defineConfig } from 'vite';
import path from 'path';
import legacy from '@vitejs/plugin-legacy';
import inject from '@rollup/plugin-inject';
import liveReload from 'vite-plugin-live-reload';
import vue from '@vitejs/plugin-vue';
import { createHtmlPlugin } from 'vite-plugin-html';
import version from './config/version.json';
import fs from 'fs-extra';
import CleanCSS from 'clean-css';

const ROOT = path.resolve('../../../');
const BASE = __dirname.replace(ROOT, '');

export default defineConfig(({ mode }) => {
    const devMode = mode === 'development';

    return {
        base: process.env.NODE_ENV === 'production' ? `${BASE}/dist/` : BASE,
        plugins: [
            inject({
                $: 'jquery',
                jQuery: 'jquery',
                'window.jQuery': 'jquery',
            }),
            liveReload(__dirname + '/**/*.php'),
            legacy({
                targets: ['defaults', 'not IE 11']
            }),
            vue(),
            createHtmlPlugin(),
            // Custom plugin to handle CSS minification after the build
            {
                name: 'post-build-css-minification',
                closeBundle: async () => {
                    const cssFilePath = path.resolve(__dirname, 'dist/css/app.css');
                    const minifiedCssFilePath = path.resolve(__dirname, 'dist/css/app.min.css');

                    if (fs.existsSync(cssFilePath)) {
                        const css = await fs.readFile(cssFilePath, 'utf8');
                        const minifiedCss = new CleanCSS().minify(css).styles;
                        await fs.writeFile(minifiedCssFilePath, minifiedCss);
                    }
                }
            }
        ],
        build: {
            outDir: 'dist',
            emptyOutDir: true,
            manifest: true,
            sourcemap: true,
            rollupOptions: {
                input: {
                    app: path.resolve(__dirname, 'src/js/app.js'),
                    // appCss: path.resolve(__dirname, 'src/scss/app.scss'),
                },
                output: {
                    entryFileNames: `js/[name]-${version.version}.min.js`,
                    chunkFileNames: `js/[name]-${version.version}.min.js`,
                    assetFileNames: assetInfo => {
                        if (assetInfo.name && assetInfo.name.endsWith('.css')) {
                            return 'css/app.css'; // Non-minified CSS
                        }
                        if (assetInfo.name && (assetInfo.name.endsWith('.woff2') || assetInfo.name.endsWith('.woff') || assetInfo.name.endsWith('.ttf'))) {
                            return 'assets/fonts/[name][extname]';
                        }
                        if (assetInfo.name && (assetInfo.name.endsWith('.jpg') || assetInfo.name.endsWith('.png') || assetInfo.name.endsWith('.svg'))) {
                            return 'assets/images/[name][extname]';
                        }
                        return 'assets/[name].[ext]';
                    }
                },
            },
            minify: false, // Initial build without minification
            write: true
        },
        resolve: {
            alias: {
                '@': path.resolve(__dirname, 'src'),
                '@components': path.resolve(__dirname, 'src/js/components'),
                '@utils': path.resolve(__dirname, 'src/js/utils')
            }
        },
        optimizeDeps: {
            exclude: ['fsevents']
        },
        server: {
            cors: true,
            strictPort: true,
            port: 3000,
            https: false,
            hmr: {
                host: 'localhost'
            },
            watch: {
                usePolling: true,
                interval: 100,
                include: ['src/**/*'], // Adjust include paths as per your project structure
                exclude: ['node_modules'] // Exclude unnecessary paths
            },
            fs: {
                strict: true,
            },
        }
    };
});
