import {defineConfig} from 'vite';
import path from 'path';
import {fileURLToPath} from 'url';
import {viteStaticCopy} from 'vite-plugin-static-copy';

const __dirname = path.dirname(fileURLToPath(import.meta.url));

export default defineConfig({
    root: 'files/custom/theme/src',

    plugins: [
        viteStaticCopy({
            targets: [
                {
                    src: path.resolve(__dirname, 'files/custom/theme/src/fonts/*'),
                    dest: path.resolve(__dirname, 'files/custom/theme/dist/css/fonts'),
                },
            ]
        })
    ],
    build: {
        outDir: path.resolve(__dirname, 'files/custom/theme/dist'),
        emptyOutDir: true,

        rollupOptions: {
            input: {
                main: path.resolve(__dirname, 'files/custom/theme/src/javascripts/main.js'),
            },
            output: {
                assetFileNames: (assetInfo) => {
                    if (assetInfo.name.endsWith('.css')) return 'css/[name][extname]';
                    if (/\.(woff2?|eot|ttf|otf)$/.test(assetInfo.name)) return 'fonts/[name][extname]';
                    if (/\.(png|jpe?g|gif|svg|webp)$/.test(assetInfo.name)) return 'images/[name][extname]';
                    if (/\.ico$/.test(assetInfo.name)) return 'images/[name][extname]';
                    return 'assets/[name][extname]';
                },
                chunkFileNames: 'javascripts/[name].js',
                entryFileNames: 'javascripts/[name].js',
            },
        },

        cssMinify: true,
        minify: 'esbuild',
    },

    css: {
        preprocessorOptions: {
            scss: {
                // additionalData: `@use "css/00-settings/tokens" as *;`,
            },
        },
    },

    resolve: {
        alias: {
            '@css': path.resolve(__dirname, 'files/custom/theme/src/css'),
            '@js': path.resolve(__dirname, 'files/custom/theme/src/javascripts'),
            '@fonts': path.resolve(__dirname, 'files/custom/theme/src/fonts'),
            '@images': path.resolve(__dirname, 'files/custom/theme/src/images'),
        },
    },
});